<div class="box-body">

<div class="col-md-12" style="padding-top: 10px;">
				<form action="{{ route('actualites.store') }}" method="POST" enctype="multipart/form-data">
					@csrf

					<fieldset>
						<div class="form-group">
							<label class="col-md-3 control-label"> Titre (*) </label>
							<div class="col-md-9 inputGroupContainer">
								<div style="width: 70%">
									<input name="titre" class="form-control" placeholder="titre" type="text"/>
								</div>
							</div>
						</div>
						<br>
						<div class="form-group">
							<label class="col-md-3 control-label"> Résumé (*) </label>
							<div class="col-md-9 inputGroupContainer">
								<div style="width: 70%">
									<textarea name="resume" class="form-control" placeholder="resume" type="text"></textarea>
								</div>
							</div>
						</div>
						<br>
						<div class="form-group">
							<label class="col-md-3 control-label"> Contenu (*) </label>
							<div class="col-md-9 inputGroupContainer">
								<div style="width: 70%">
									<textarea name="contenu" class="form-control" rows="10" placeholder="contenu (HTML)" type="text"></textarea>
								</div>
							</div>
						</div>
						<br>
						<div class="form-group">
					    <label class="col-md-3 control-label"> Image: </label>
					    <div class="col-md-9 inputGroupContainer">
					      <div style="width: 70%">
					        <input name="image" type="file" placeholder="image" />
					      </div>
					    </div>
						</div>

						
					</fieldset>

					<div class="row" style="padding-top: 30px; margin-left: 35%;">
						<a href="{{route('actualites.index')}}" class=" btn btn-lg btn-default"><i class="fa  fa-mail-reply"></i> &nbsp; Annuler </a>
						<button type="submit" class=" btn btn-lg btn-primary"><i class="fa fa-check"></i> Ajouter </button><br><br>
					</div>
				</form>
</div>

</div>