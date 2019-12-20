<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Imovel;
use App\ImagemImovel;
use App\TipoImovel;
use App\CategoriaImovel;
use App\TipoAnuncio;
use App\TipoAnunciante;
use App\AreasPrivativas;
use App\AreasComuns;
use App\Pacote;
use App\Compra;
use CWG\PagSeguro\PagSeguroAssinaturas;
use DB;

class PagSeguroController extends Controller
{

    protected $pagseguro;
    protected $user;

    public function __construct()
    {
        $this->pagseguro = new PagSeguroAssinaturas($this->email, $this->token, $this->sandbox);
        $this->user = Auth::user();
    }
    //

    public function checkout(Request $request){
        $this->user = Auth::user();
        $pacotes = Pacote::where('cd_status','=',1)->get();    
        $js = $this->pagseguro->preparaCheckoutTransparente(); 
        // dd($js);
        return view('pagseguro.checkout',[
            'pacotes'=>$pacotes,
            'inputs'=>$request->all(),
            'js'=>$js,
            'user'=>$this->user
            // (object)[
            //     'id'=>->id,
            //     'name'=>$this->user->name,
            //     'email'=>$this->user->email,
            //     'nm_telefone'=>$this->user->nm_telefone,
            //     'cd_document'=>$this->user->cd_document,
            //     'cd_cep'=>$this->user->cd_cep,
            //     'nm_endereco'=>$this->user->nm_endereco,
            //     'nm_numero'=>$this->user->nm_numero,
            //     'nm_complemento'=>$this->user->nm_complemento,
            //     'nm_bairro'=>$this->user->nm_bairro,
            //     'nm_cidade'=>$this->user->nm_cidade,
            //     'cd_uf'=>$this->user->cd_uf
            // ]
        ]);
    }
    public function checkout_conclusion(Request $request){
        $data = $request->all();
        $this->user = Auth::user();
        $data['nm_telefone'] = preg_replace( '/[^0-9]/', '', $data['nm_telefone'] );
        $data['nm_telefone'] = preg_replace( '/[^0-9]/', '', $data['nm_telefone'] );
        $data['cd_document'] = preg_replace( '/[^0-9]/', '', $data['cd_document'] );

        //Nome do comprador igual a como esta no CARTÂO
        $this->pagseguro->setNomeCliente($data['nm_tratamento']);	
        //Email do comprovador
        if($this->sandbox){
            $this->pagseguro->setEmailCliente("c74561683734852837592@sandbox.pagseguro.com.br");
        }else{
            $this->pagseguro->setEmailCliente($this->user->email);
        }
        //Informa o telefone DD e número
        $this->pagseguro->setTelefone(substr($data['nm_telefone'],0,2), substr($data['nm_telefone'],2));
        //Informa o CPF ou CNPJ
        if(strlen($data['cd_document']) <= 11 ){
            $this->pagseguro->setCPF($data['cd_document']);
            
        }else{
            $this->pagseguro->setCNPJ($data['cd_document']);
        } 
        //Informa o endereço RUA, NUMERO, COMPLEMENTO, BAIRRO, CIDADE, ESTADO, CEP
        $data['cd_cep'] = preg_replace( '/[^0-9]/', '', $data['cd_cep'] );
        $this->pagseguro->setEnderecoCliente($data['nm_endereco'], $data['nm_numero'], $data['nm_complemento'], $data['nm_bairro'], $data['nm_cidade'], $data['cd_uf'], $data['cd_cep']);
        //Informa o ano de nascimento
        $this->pagseguro->setNascimentoCliente($data['dt_nasc']);
        //Infora o Hash  gerado na etapa anterior (assinando.php), é obrigatório para comunicação com checkoutr transparente
        $this->pagseguro->setHashCliente($data['pagseguro_cliente_hash']);
        //Informa o Token do Cartão de Crédito gerado na etapa anterior (assinando.php)
        $this->pagseguro->setTokenCartao($data['pagseguro_cartao_token']);
        //Código usado pelo vendedor para identificar qual é a compra
        $this->pagseguro->setReferencia($this->user->id);	
        //Plano usado (Esse código é criado durante a criação do plano)
        $this->pagseguro->setPlanoCode($data['plain']);
        // dd([$this->pagseguro, $data]);
        try{
            $codigoAssinatura = $this->pagseguro->assinaPlano();
            echo 'Compra realizada com sucesso! <br> O código unico da assinatura é: ' . $codigoAssinatura.'<br>';
            if($this->atualizaCompra($codigoAssinatura)){
               return  redirect('/planos');
            }else{
                return redirect()->back()->withInputs();
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function atualizaCompra($cod_assinatura){
        $assinatura = $this->pagseguro->consultaAssinatura($cod_assinatura);
        if(!$assinatura){
            return false;
        }else{
            $user_id = preg_replace( '/[^0-9]/', '', $assinatura['reference'] );
            $pacote = Pacote::where('nm_titulo', $assinatura['name'] )->first();

            $compra = Compra::where('cd_user', $user_id)->where('ic_processado','1')->where('ic_tipo','1')->first();
            if(!$compra){
                $compra = new Compra;
            }

            $compra -> cd_user = $this->user->id;
            $compra -> cd_pacote = ($pacote?$pacote->cd_pacote:0);
            $compra -> vl_total = ($pacote?$pacote->vl_pacote:0);
            $compra -> ic_processado = $this->statusPagSeguro($assinatura['status']);
            $compra -> cd_pagseguro = $assinatura['code'];
            $compra->save();
            
            return true;

        } 
    }

    public function retornoAssinatura(Request $request){
        
        $assinatura = $this->pagseguro->consultaAssinatura($request->id);
        dd($assinatura);
        if(!$assinatura){
            return redirect('/planos')->with('error','Não foi possível validar sua assinatura.');
        }else{
            $pacote = Pacote::where('nm_titulo', $assinatura['reference'] )->first();
            $compra = new Compra;
            $compra -> cd_user = $this->user->id;
            $compra -> cd_pacote = ($pacote?$pacote->cd_pacote:0);
            $compra -> vl_total = ($pacote?$pacote->vl_pacote:0);
            $compra -> ic_processado = $this->statusPagSeguro($assinatura['status']);
            $compra -> cd_pagseguro = $assinatura['code'];
            $compra->save();
            return redirect('/planos');

        } 
    }

    public function cancelamento($id_pagseguro){ 

        $compra = Compra::where('cd_pagseguro',$id_pagseguro)->first();
        if(!$compra){
            return redirect()->back()->with('error','Compra não encontrada');
        }
        try {
            $cancel = $this->pagseguro->cancelarAssinatura($id_pagseguro);
            if($cancel){
                $assinatura = $this->pagseguro->consultaAssinatura($id_pagseguro);
                // dd($assinatura);    
                $compra -> ic_processado = $this->statusPagSeguro($assinatura['status']);
                $compra->save();
            }
            return redirect()->back(); 
            //code...
        } catch (\Exception $ex) { 
            return redirect()->back()->with('error',$ex->getMessage());
        }
    }

    public function notificacao(Request $request){ 
        if( isset($request->notificationType) && isset($request->notificationCode) ){
            switch ($request->notificationType) {
                case 'preApproval': 
                        $assinatura = $this->pagseguro->consultarNotificacao($request->notificationCode);
                        $compra = Compra::where('cd_pagseguro',$assinatura['code'])->first();
                        $compra -> ic_processado = $this->statusPagSeguro($assinatura['status']);
                        $compra->save();
                    break;
                default:
                    # code...
                    break;
            }
            return 'ok';
        }
    }   
    

}