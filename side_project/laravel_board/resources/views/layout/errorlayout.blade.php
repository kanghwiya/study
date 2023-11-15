@forelse ($errors->all() as $val)
<div id="emailHelp" class="form-text text-danger">{{$val}}</div>
@empty
@endforelse

{{-- <input type="hidden" name="ctokekn" value="ewjljlkegljldsjlf214j5ewjijoj"> --}}