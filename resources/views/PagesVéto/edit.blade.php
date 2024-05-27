<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>edit vétérinaire</title>
    <meta name="viewport" content="width=device-width,
      initial-scale=1.0"/>
      <link href="{{ asset('css/InscripVéto.css') }}" rel="stylesheet">
   
   
  </head>
  <body>
  
  
    <div class="container">
       
      <h1 class="form-title">modification inscription </h1>
      <form enctype="multipart/form-data" id="addPetForm" method="POST"
                            action="{{ route('veto.update', $veto->id) }}">

      @method('put')
            @csrf
        <div class="main-user-info">
          <div class="user-input-box">
            <label for="nom">Nom </label>
            <input type="text"
               id="nom"
              value=" {{ old('nom',$veto->Nom) }}"
                    name="nom"
                    placeholder="Nom "/>
                    @error('nom')
                      <p class="invalid-feedback">{{ $message }}</p>
                  @enderror
          </div>
          <div class="user-input-box">
            <label for="prenom">prenom</label>
            <input type="text"
                    id="prenom"
                 
                    name="prenom"
                    value=" {{ old('prenom',$veto->prenom) }}"
                    placeholder="prenom"/>
                    @error('prenom')
                      <p class="invalid-feedback">{{ $message }}</p>
                  @enderror
          </div>
          <div class="user-input-box">
            <label for="numtel">numero de telephone</label>
            <input type="text"
                    id="numtel"
                    name="numtel"
                    value=" {{ old('numtel',$veto->numtel) }}"
                    placeholder="numero de telephone"/>
                    @error('numtel')
                      <p class="invalid-feedback">{{ $message }}</p>
                  @enderror
          </div>
          <div class="user-input-box">
            <label for="nom_cabinet">nom cabinet</label>
            <input type="text"
                    id="nom_cabinet"
                    name="nom_cabinet"
                    value=" {{ old('nom_cabinet',$veto->nom_cabinet) }}"
                    placeholder="nom cabinet"/>
                    @error('nom_cabinet')
                      <p class="invalid-feedback">{{ $message }}</p>
                  @enderror
          </div>
          <div class="user-input-box">
        
            <label for="heure_travail">heur de travail</label>
            <input type="text"
                    id="heure_travail"
                    name="heure_travail"
                    value=" {{ old('heure_travail',$veto->heure_travail) }}"
                    placeholder="heur de travail"/>
                    @error('heure_travail')
                      <p class="invalid-feedback">{{ $message }}</p>
                  @enderror
          </div>
          <div class="user-input-box">
            <label for="frais_consultation">frais consultation</label>
            <input type="text"
                    id="frais_consultation"
                    name="frais_consultation"
                    value=" {{ old('frais_consultation',$veto->frais_consultation) }}"
                    placeholder="frais consultation"/>
                    @error('frais_consultation')
                      <p class="invalid-feedback">{{ $message }}</p>
                  @enderror  
          </div>
          <div class="user-input-box">
            <label for="localisation">localisation</label>
            <input type="text"
                    id="localisation"
                    name="localisation"
                    value=" {{ old('localisation',$veto->localisation) }}"
                    placeholder="localisation"/>
                    @error('localisation')
                      <p class="invalid-feedback">{{ $message }}</p>
                  @enderror 
          </div>
          <div class="user-input-box">
            <label for="description">description</label>
            <input type="textarea"
                    id="description"
                    name="description"
                    value=" {{ old('description',$veto->description) }}"
                    placeholder="ajouter les autres infos"/>
                    @error('description')
                      <p class="invalid-feedback">{{ $message }}</p>
                  @enderror
          </div>
          
        </div>
        
           <div>
          <label for="petPhoto">Photo:</label>
          <input type="file" id="Image" name="Image" accept="image/*" value="{{ old('image',$veto->image) }}">
          @if($veto->image != "")
          <img class="w-50 my-2" src="{{ asset('uploads/Vetos/' .$veto->image) }}" alt="{{ $veto->image }}" >
                    @endif
      </div>
     
        <div class="form-submit-btn">
          <input type="submit" value="modifier">
        </div>
          


      
    
  </body>
</html>