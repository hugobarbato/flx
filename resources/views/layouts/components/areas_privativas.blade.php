@foreach($AreasPrivativas as $k=>$ap)
    <div class="col-md-4">
        <div>
            <input type="checkbox" name="ds_areas_privativas[]" 
            id="ap{{$ap->cd_areas_privativas}}" value="{{$ap->cd_areas_privativas}}"> 
            <label for="ap{{$ap->cd_areas_privativas}}" >
                {{((strtolower($ap->nm_areas_privativas)))}}
            </label> 
        </div>
    </div>
@endforeach 