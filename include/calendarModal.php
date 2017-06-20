<!-- Modal -->
<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
        <div class="modal-content">
        <form class="form-horizontal" method="POST" action="functions/addEvent.php" onsubmit="return checkForm(this);">

          <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Añadir Ejercicio</h4>
          </div>
          <div class="modal-body">
                  <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">Ejercicio</label>
                        <div class="col-sm-10">
                            <select name='title' class="form-control">
                                <option disabled selected>Selecciona</option>
                                <option disabled>--------------------HOMBROS--------------------</option>
                                <?php loadSelect("HOMBROS"); ?>
                                <option disabled>-------------------- PECHO --------------------</option>
                                <?php loadSelect("PECHO"); ?>
                                <option disabled>--------------------ESPALDA--------------------</option>
                                <?php loadSelect("ESPALDA"); ?>
                                <option disabled>---------------------BRAZOS--------------------</option>
                                <?php loadSelect("BRAZOS"); ?>
                                <option disabled>--------------------PIERNAS--------------------</option>
                                <?php loadSelect("PIERNAS"); ?>
                            </select>
                        </div>
                  </div>
                  <div class="form-group">
                        <label for="color" class="col-sm-2 control-label">Color</label>
                        <div class="col-sm-10">
                          <select name="color" class="form-control" id="color">
                                  <option value="">Elige</option>
                                  <option style="color:#0071c5;" value="#0071c5">&#9724; Azul oscuro</option>
                                  <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquesa</option>
                                  <option style="color:#008000;" value="#008000">&#9724; Verde</option>						  
                                  <option style="color:#FFD700;" value="#FFD700">&#9724; Amarillo</option>
                                  <option style="color:#FF8C00;" value="#FF8C00">&#9724; Naranja</option>
                                  <option style="color:#FF0000;" value="#FF0000">&#9724; Rojo</option>
                                  <option style="color:#000;" value="#000">&#9724; Negro</option>
                                </select>
                        </div>
                  </div>
                  <div class="form-group">
                        <label for="start" class="col-sm-2 control-label">Empieza</label>
                        <div class="col-sm-10">
                          <input type="text" name="start" class="form-control" id="start" readonly>
                        </div>
                  </div>
                  <div class="form-group" style="display: none;">
                        <label for="end" class="col-sm-2 control-label">Acaba</label>
                        <div class="col-sm-10">
                          <input type="text" name="end" class="form-control" id="end" readonly>
                        </div>
                  </div>
                  <div class="form-group">
                        <label for="start" class="col-sm-2 control-label">Peso</label>
                        <div class="col-sm-10">
                          <input type="number" name="peso" step="0.5" min="0" max="100" class="form-control" placeholder="Peso">
                        </div>
                  </div>
                  <div class="form-group">
                        <label for="start" class="col-sm-2 control-label">Repeticiones</label>
                        <div class="col-sm-10">
                          <input type="number" name="repeticiones" min="0" max="1000" class="form-control" placeholder="Repeticiones">
                        </div>
                  </div>
                  <div class="form-group">
                        <label for="start" class="col-sm-2 control-label">Series</label>
                        <div class="col-sm-10">
                          <input type="number" name="series" min="0" max="50" class="form-control" placeholder="Series">
                        </div>
                  </div>
          </div>
          <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button name="addGuardar" type="submit" class="btn btn-primary">Guardar</button>
<!--                <button id="botonAdd" onclick="add(event);" class="btn btn-primary">Guardar</button>-->
          </div>
        </form>
        </div>
  </div>
</div>



<!-- Modal -->
<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
        <div class="modal-content">
        <form class="form-horizontal" method="POST" action="functions/editEventTitle.php">
          <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Editar Ejercicio</h4>
          </div>
          <div class="modal-body">
                  <div class="form-group">
                        <label for="color" class="col-sm-2 control-label">Color</label>
                        <div class="col-sm-10">
                          <select name="color" class="form-control" id="color">
                                  <option value="">Elige</option>
                                  <option style="color:#0071c5;" value="#0071c5">&#9724; Azul oscuro</option>
                                  <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquesa</option>
                                  <option style="color:#008000;" value="#008000">&#9724; Verde</option>						  
                                  <option style="color:#FFD700;" value="#FFD700">&#9724; Amarillo</option>
                                  <option style="color:#FF8C00;" value="#FF8C00">&#9724; Naranja</option>
                                  <option style="color:#FF0000;" value="#FF0000">&#9724; Rojo</option>
                                  <option style="color:#000;" value="#000">&#9724; Negro</option>  
                                </select>
                        </div>
                  </div>
                  <div class="form-group">
                      <label for="peso" class="col-sm-2 control-label">Peso</label>
                      <div class="col-sm-10">
                          <input type="number" name="peso" step="0.5" min="0" max="100" class="form-control" placeholder="Peso">
                        </div>
                  </div>
                  <div class="form-group">
                      <label for="repeticiones" class="col-sm-2 control-label">Repeticiones</label>
                      <div class="col-sm-10">
                          <input type="number" name="repeticiones" min="0" max="1000" class="form-control" placeholder="Repeticiones">
                        </div>
                  </div>
                  <div class="form-group">
                      <label for="series" class="col-sm-2 control-label">Series</label>
                      <div class="col-sm-10">
                          <input type="number" name="series" min="0" max="50" class="form-control" placeholder="Series">
                        </div>
                  </div>
                    <div class="form-group"> 
                                <div class="col-sm-offset-2 col-sm-10">
                                  <div class="checkbox">
                                        <label class="text-danger"><input type="checkbox"  name="delete"> Borrar Ejercicio</label>
                                  </div>
                                </div>
                        </div>
                  <input type="hidden" name="id" class="form-control" id="id">	
          </div>
          <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar cambios</button>
          </div>
        </form>
        </div>
  </div>
</div>
