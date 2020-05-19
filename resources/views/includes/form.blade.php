@csrf <!-- Vérification de l'identité du client-->
<div class="form-group">
   <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Taper votre pseudo" value="{{ old('name')  ?? $client->name }}"> <!--old('value') : Si je entre une information erronée, l'ancienne information est conservée-->
  @error('name')
    <div class="invalid-feedback">{{ $errors->first('name') }}</div>
  @enderror
</div>
<div class="form-group">
  <input type="email" class="form-control  @error('email') is-invalid @enderror" name="email" placeholder="Taper votre email" value="{{ old('email') ?? $client->email }}">
  @error('email')
    <div class="invalid-feedback">{{ $errors->first('email') }}</div>
  @enderror
</div>
<div class="form-group">
  <select class="custom-select @error('status') is-invalid @enderror" name="status">
    @foreach($client->getStatusOptions() as $key => $value)
      <option value="{{ $key }}" {{ $client->status == $value ? 'selected' : '' }}>{{ $value }}</option>
    @endforeach
  </select>
  @error('status')
    <div class="invalid-feedback">{{ $errors->first('status') }}</div>
  @enderror
</div>
<div class="form-group">
  <select class="custom-select @error('entreprise_id') is-invalid @enderror" name="entreprise_id">
    @foreach($entreprises as $entreprise)
    <option value="{{ $entreprise->id }}" {{ $client->entreprise_id == $entreprise->id ? 'selected' : '' }}>{{$entreprise->name}}</option>
    @endforeach
  </select>
  @error('entreprise_id')
    <div class="invalid-feedback">{{ $errors->first('entreprise_id') }}</div>
  @enderror
</div>
<div class="form-group">
  <div class="custom-file">
    <input type="file" name="image" class="custom-file-input" id="validatedCustomFile" @error('image') is-invalid @enderror>
    <label class="custom-file-label" for="validatedCustomFile">Choisir une image</label>
    @error('image')
      <div class="invalid-feedback">{{ $errors->first('name') }}</div>
    @enderror
  </div>

</div>
