<form class="well form-horizontal" action="{{url('equipes/'. $equipe->id) }} " method="post" enctype="multipart/form-data"  id="contact_form">
	<input type="hidden" name="_method" value="PUT">
		{{ csrf_field() }}
		<fieldset>

			<div class="form-group ">
				<label class="col-md-3 control-label">Intitulé</label>  
				<div class="col-md-9 inputGroupContainer">
					<div class="input-group" style="width: 70%">
						<input  name="intitule" class="form-control" value="{{$equipe->intitule}}" type="text">
					</div>
				</div>
			</div>

			<div class="form-group ">
				<label class="col-md-3 control-label">Achronyme</label>  
				<div class="col-md-9 inputGroupContainer">
					<div class="input-group" style="width: 70%">
						<input  name="achronymes" class="form-control" value="{{$equipe->achronymes}}" type="text">
					</div>
				</div>
			</div>

			<div class="form-group ">
				<label class="col-xs-3 control-label">Chef de l'équipe</label>  
				<div class="col-xs-9 inputGroupContainer">
					<div class="input-group" style="width: 70%">

						<select name="chef_id" class="form-control select2">
							<option value="{{$equipe->chef->id}}">{{$equipe->chef->name}} {{$equipe->chef->prenom}}</option>
							 @foreach($membres as $membre)
							<option value="{{$membre->id}}">{{$membre->name}} {{$membre->prenom}}</option>
							 @endforeach
						</select>
					</div>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-3 control-label">Résumé</label>
				<div class="col-md-9 inputGroupContainer">
					<div style="width: 70%">
						<textarea name="resume" class="form-control" rows="3" placeholder="Entrez ...">{{$equipe->resume}}</textarea>
					</div>
				</div>
			</div>

			<div class="form-group">
					<label class="col-md-3 control-label">Axes de recherche</label>
					<div class="col-md-9 inputGroupContainer">
						<div style="width: 70%">
							<textarea name="axe_recherche" class="form-control" rows="3" placeholder="Entrez ...">{{$equipe->axes_recherche}}</textarea>
						</div>
					</div>
			</div>

			<div class="form-group">
				<label class="col-md-3 control-label">Photo</label>
				<div class="col-md-2"></div>
				<div class="col-md-5 inputGroupContainer">
					<div style="width: 70%">
						<input name="img" type="file">
					</div>
				</div>
			</div>

		</fieldset>

		<div style="padding-top: 30px; margin-left: 35%;">
			<a href="{{url('equipes/'.$equipe->id.'/details')}}" class=" btn btn-lg btn-default"><i class="fa  fa-mail-reply"></i> &nbsp;Annuler</a>
			<button type="submit" class=" btn btn-lg btn-primary"><i class="fa fa-check"></i> Modifier</button> 
		</div>
	</form>