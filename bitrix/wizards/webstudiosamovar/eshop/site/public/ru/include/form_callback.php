                        <!-- РћРєРЅРѕ "Р·Р°РєР°Р·Р°С‚СЊ Р·РІРѕРЅРѕРє" -->
<?
IncludeTemplateLangFile($_SERVER["DOCUMENT_ROOT"]."/bitrix/templates/".SITE_TEMPLATE_ID."/form_modal.php");
?>
                <div class="modal  fade text-left" id="callback" tabindex="-1" role="dialog" aria-labelledby="callbackLabel" aria-hidden="true">
                  <div class="modal-dialog">
              <form name="sentMessage" id="callback"  class="form-horizontal" novalidate>
                    <div class="modal-content">
                      <div class="modal-header" style="border-bottom: none; margin-bottom: 0;">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h3><?=GetMessage('form_callback_name')?></h3>
                      </div>

                      <div class="modal-body">
                        <div id="contacts">
                          <div class="row">
                            <!-- Alignment -->
                            <div class="col-sm-offset-1 col-sm-10">
                              <div id="success"></div> <!-- For success/fail messages -->

                                <div class="form-group control-group">
                                  <label class="col-sm-3 control-label"><?=GetMessage('form_fio')?></label>
                                  <div class="col-sm-9 controls">
                                    <input type="text" class="form-control"
                                    id="name" required
                                    value = "<?=$USER->GetFullName()?>"
                                    data-validation-required-message="<?=GetMessage('form_fio_error')?>" />

                                  </div>
                                </div>

                                <div class="form-group control-group">
                                  <label class="col-sm-3 control-label"><?=GetMessage('form_tel')?></label>
                                  <div class="col-sm-9 controls">
                                    <input type="text"
                                    class="form-control"
                                    data-validation-regex-regex="^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{5,10}$"
                                    data-validation-regex-message="<?=GetMessage('form_tel_error_1')?>"
                                    id="phone" required
                                    data-validation-required-message="<?=GetMessage('form_tel_error')?>" />
                                  </div>
                                </div>



                                <div class="form-group control-group">
                                  <label class="col-sm-3 control-label"></label>
                                  <div class="col-sm-9 controls">
                                    <div><input type="checkbox" name="checkme" required
                                    data-validation-required-message="<?=GetMessage('submit_y_error')?>" /> <?=getmessage('submit_y')?></div>

                                  </div>
                                </div>

                      </div>
                    </div>
                  </div>
                </div>

                <div class="modal-footer" style="margin: 0">
                    <div class="col-sm-offset-1 col-sm-10" style="padding-right: 0">
                            <button type="submit" class="btn btn-default"><i class="fa fa-check"></i> <?=GetMessage('form_sendmail')?></button>
                          <button type="button" class="btn" data-dismiss="modal"><i class="fa fa-times"></i> <?=GetMessage('form_close')?></button>
                    </div>
                </div>
              </div>
              </form>
            </div>
          </div>

          <!-- /РћРєРЅРѕ "Р·Р°РєР°Р·Р°С‚СЊ Р·РІРѕРЅРѕРє" -->

<script>
                  /*
          Jquery Validation using jqBootstrapValidation
           example is taken from jqBootstrapValidation docs
          */
        $(function() {

         $("#callback").find('textarea,input').jqBootstrapValidation(
            {
             preventSubmit: true,
             submitError: function($form, event, errors) {
              // something to have when submit produces an error ?
              // Not decided if I need it yet
             },
             submitSuccess: function($form, event) {
              event.preventDefault(); // prevent default submit behaviour
               // get values from FORM
               var name = $("input#name").val();
               var phone = $("input#phone").val();
               var firstName = name; // For Success/Failure Message
                   // Check for white space in name for Success/Fail message
                if (firstName.indexOf(' ') >= 0) {
             firstName = name.split(' ').slice(0, -1).join(' ');
                 }
           $.ajax({
                      url: "<?=SITE_DIR?>include/recall_me.php",
                      type: "POST",
                      data: {name: name, phone: phone},
                      cache: false,
                      success: function() {
                      // Success message
                         $('#success').html("<div class='alert alert-success'>");
                         $('#success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append( "</button>");
                        $('#success > .alert-success')
                        .append(firstName+"<?=GetMessage('form_ok')?>");
              $('#success > .alert-success')
              .append('</div>');

              //clear all fields
              $('#callback').trigger("reset");
                },
             error: function() {
            // Fail message
             $('#success').html("<div class='alert alert-danger'>");
                      $('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                       .append( "</button>");
                      $('#success > .alert-danger').append("<strong><?=GetMessage('form_error_sorry')?>, "+firstName+".<?=GetMessage('form_error_problem')?></strong>");
                  $('#success > .alert-danger').append('</div>');
            //clear all fields
            $('#callback').trigger("reset");
              },
                   })
                 },
                 filter: function() {
                           return $(this).is(":visible");
                 },
               });

              $("a[data-toggle=\"tab\"]").click(function(e) {
                            e.preventDefault();
                            $(this).tab("show");
                });
          });

        /*When clicking on Full hide fail/success boxes */
        $('#name').focus(function() {
             $('#success').html('');
          });

</script>