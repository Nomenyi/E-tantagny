	<div class="app-main__outer">
		<div class="app-main__inner">
			<ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
				<li class="nav-item">
					<a role="tab" class="nav-link active show" id="tab-0" data-toggle="tab" href="#tab-content-0" aria-selected="true">
						<span>classe de 2nd</span>
					</a>
				</li>
				<li class="nav-item">
					<a role="tab" class="nav-link" id="tab-1" data-toggle="tab" href="#tab-content-1" aria-selected="false">
						<span>classe de 1er</span>
					</a>
				</li>
				<li class="nav-item">
					<a role="tab" class="nav-link" id="tab-2" data-toggle="tab" href="#tab-content-2" aria-selected="false">
						<span>classe de terminal</span>
					</a>
				</li>
			</ul>
			<div class="row" id="tab-content-0" role="tabpanel">
				<h5 class="card-title btn" data-toggle="collapse" data-target="#presenceSeconde" style="text-align:center; color:blue;">LISTES DES PRESENCES</h5>
				<h5 class="card-title btn" data-toggle="collapse" data-target="#ficheSeconde" style="text-align:center; color:blue;">FICHE DE PRESENCES</h5>
												
				<div class="col-md-12 col-lg-12 mb">
					<div class="mb-3 card " >
						<div class="card-body collapse" id="presenceSeconde">
							<div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">							
								<div class="row">
									<div class="col-sm-12">
										<div   class="dataTables_wrapper dt-bootstrap4 no-footer">
											<div class="row">
												<div class="col-sm-12">
													<table id="example1" class="table table-bordered table-striped table-hover dataTable dtr-inline no-footer" role="grid" aria-describedby="example1_info">
														<thead>
															<tr role="row">
																<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Nom &amp;amp; Prenom activate to sort column ascending">
																	DATE
																</th>
																<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Matricule activate to sort column descending" aria-sort="ascending">
																	MATRICULE
																</th>
																<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Nom &amp;amp; Prenom activate to sort column ascending">
																	NOM &amp; PRENOM
																</th>
																<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Nom &amp;amp; Prenom activate to sort column ascending">
																	ETAT
																</th>
															</tr>
														</thead>
														<tbody>    																
															<tr rol="row" class="odd">
																<td tabindex="0" class="sorting_1">20/02/2020</td>
																<td>Firefox 1.0</td>
																<td>Win 98+ / OSX.2+</td>
																<td class="text-center">
																	<div class="badge badge-danger">Abscent</div>
																</td>
															</tr>
															<tr role="row" class="even">
																<td tabindex="0" class="sorting_1">20/02/2020</td>
																<td>Firefox 1.5</td>
																<td>Win 98+ / OSX.2+</td>
																<td class="text-center">
																	<div class="badge badge-success">Present</div>
																</td>
															</tr>
														</tbody>
														
													</table>
												</div>
											</div>
										</div>
									</div>
								</div>
								</div>
							</div>
						</div>
					</div>
				</div>

					
				<div class="col-md-12 col-lg-12 mb collapse" id="ficheSeconde">
					<div class="mb-3 card">
						<div class="card-body">
							<div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">							
								<div class="row">
									<div class="col-sm-12">
										<div  class="  dataTables_wrapper dt-bootstrap4 no-footer">
											<div class="row">
												<div class="col-sm-12">
													<table id="fiche" class="table table-bordered table-striped table-hover dataTable dtr-inline no-footer" role="grid" aria-describedby="example1_info">
														<thead>
															<tr role="row">
																<th class="sorting_asc" tabindex="0" aria-controls="fiche" rowspan="1" colspan="1" aria-label="Matricule activate to sort column descending" aria-sort="ascending">
																	MATRICULE
																</th>
																<th class="sorting" tabindex="0" aria-controls="fiche" rowspan="1" colspan="1" aria-label="Nom &amp;amp; Prenom activate to sort column ascending">
																	NOM &amp; PRENOM
																</th>
																<th class="sorting" tabindex="0" aria-controls="fiche" rowspan="1" colspan="1" aria-label="Nom &amp;amp; Prenom activate to sort column ascending">
																	ETAT
																</th>
															</tr>
														</thead>
														<tbody>    																
															<tr rol="row" class="odd">
																<td>Firefox 1.0</td>
																<td>Win 98+ / OSX.2+</td>
																<td class="text-center">
																	<div class="position-relative form-group">
																		<div>
																			<div class="custom-radio custom-control custom-control-inline">
																				<input type="radio" id="exampleCustomInline" class="custom-control-input">
																				<label class="custom-control-label" for="exampleCustomInline">Pr</label>
																			</div>
																			<div class="custom-radio custom-control custom-control-inline">
																				<input type="radio" id="exampleCustomInline2" class="custom-control-input">
																				<label class="custom-control-label" for="exampleCustomInline2">Abs</label>
																			</div>
																		</div>
																	</div>
																</td>
															</tr>
															<tr rol="row" class="odd">
																<td>Firefox 1.0</td>
																<td>Win 98+ / OSX.2+</td>
																<td class="text-center">
																	<div class="position-relative form-group">
																		<div>
																			<div class="custom-radio custom-control custom-control-inline">
																				<input type="radio" id="exampleCustomInline" class="custom-control-input">
																				<label class="custom-control-label" for="exampleCustomInline">Pr</label>
																			</div>
																			<div class="custom-radio custom-control custom-control-inline">
																				<input type="radio" id="exampleCustomInline2" class="custom-control-input">
																				<label class="custom-control-label" for="exampleCustomInline2">Abs</label>
																			</div>
																		</div>
																	</div>
																</td>
															</tr>
														</tbody>
													</table>
													<div class="position-relative row form-check">
														<div class="col-sm-10 offset-sm-2">
															<button class="btn btn-secondary">Submit</button>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	</body>

	</html>
