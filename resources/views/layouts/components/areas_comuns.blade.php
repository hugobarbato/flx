@foreach( $AreasComuns as  $ac )
    <div class="col-md-4">
        <div>
            <input type="checkbox" name="ds_areas_comuns[]" 
                id="ac{{$ac->cd_areas_comuns}}" value="{{$ac->cd_areas_comuns}}" > 
            <label for="ac{{$ac->cd_areas_comuns}}" >
                {{((strtolower($ac->nm_areas_comuns)))}}
            </label> 
        </div>
    </div>
@endforeach 