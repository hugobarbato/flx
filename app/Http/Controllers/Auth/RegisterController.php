<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'cd_document' => ['required','string', 'max:20', 'unique:users'],
            'cd_cep' => ['required', 'string', 'max:10'],
            'nm_endereco' => ['required', 'string', 'max:255'],
            'nm_numero' => ['required', 'string', 'max:10'],
            'nm_complemento' => [ 'string', 'max:50'],
            'nm_bairro' => ['required', 'string', 'max:100'],
            'nm_cidade' => ['required', 'string', 'max:100'],
            'cd_uf' => ['required', 'string', 'max:2'],
            'nm_tratamento' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ],[
            'name.required'=>'Informe o campo "Nome Completo / Razão Social". ',
            'name.string'=>'Campo "Nome Completo / Razão Social" inválido.',
            'name.max'=>'O campo "Nome Completo / Razão Social" precisa ter no maximo 255 caracteres',
            
            'email.required'=>'Informe o campo "Email".',
            'email.string'=>'Campo "Email" inválido.',
            'email.email'=>'Informe um e-mail válido;',
            'email.unique'=>'Ops, aparentemente este e-mail já se encontra cadastrado!',
            'email.max'=>'O campo "E-mail" precisa ter no maximo 255 caracteres',
            
            'cd_document.required'=>'Informe o "CPF/CNPJ".',
            'cd_document.string'=>'Informe o "CPF/CNPJ".',
            'cd_document.unique'=>'O "CPF/CNPJ" já consta em nossos cadastros.',
            'cd_document.max'=>'O campo "CPF/CNPJ" precisa ter no maximo 255 caracteres',
            
            'cd_cep.required'=>'Informe o cep.',
            'cd_cep.string'=>'Cep inválido.',
            'cd_cep.max'=>'O campo "Cep" precisa ter no maximo 255 caracteres',
            
            'nm_endereco.required'=>'Informe o endereço.',
            'nm_endereco.string'=>'Endereço inválido.',
            'nm_endereco.max'=>'O campo "Endereço" precisa ter no maximo 255 caracteres',
            
            'nm_numero.required'=>'Informe o número.',
            'nm_numero.string'=>'Número inválido',
            'nm_numero.max'=>'O campo "Número" precisa ter no maximo 10 caracteres',
            
            'nm_complemento.string'=>'Complemento inválido.',
            'nm_complemento.max'=>'O campo "Complemento" precisa ter no maximo 50 caracteres',
            
            'nm_bairro.required'=>'Informe o bairro.',
            'nm_bairro.string'=>'Bairro inválido.',
            'nm_bairro.max'=>'O campo "Bairro" precisa ter no maximo 100 caracteres',
            
            'nm_cidade.required'=>'Informe a cidade',
            'nm_cidade.string'=>'Cidade inválida.',
            'nm_cidade.max'=>'O campo "Cidade" precisa ter no maximo 100 caracteres',
            
            'cd_uf.required'=>'Informe a UF.',
            'cd_uf.string'=>'UF inválida.',
            'cd_uf.max'=>'O campo "UF" precisa ter no maximo 2 caracteres',
            
            'nm_tratamento.required'=>'Informe o responsável.',
            'nm_tratamento.string'=>'Responsável inválido',
            'nm_tratamento.max'=>'O campo "Responsável" precisa ter no maximo 255 caracteres',
            
            'password.required'=>'Informe a senha.',
            'password.string'=> 'Senha inválida ou muito fraca.',
            'password.max'=> ' Sua senha poderá ter no maximo 8 caracteres',
            'password.confirmed'=>'As senhas não coincidem'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {   
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'cd_document' => $data['cd_document'],
            'cd_cep' => $data['cd_cep'],
            'nm_endereco' => $data['nm_endereco'],
            'nm_numero' => $data['nm_numero'],
            'nm_complemento' => $data['nm_complemento'],
            'nm_bairro' => $data['nm_bairro'],
            'nm_cidade' => $data['nm_cidade'],
            'cd_uf' => $data['cd_uf'],
            'nm_tratamento' => $data['nm_tratamento'],
            'ic_juridica' => $data['ic_juridica'],
            'nm_telefone'=>$data['nm_telefone']
        ]);
    }
}
