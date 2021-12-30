<?
IncludeTemplateLangFile($_SERVER["DOCUMENT_ROOT"]."/bitrix/templates/".SITE_TEMPLATE_ID."/form_modal.php");

function form_zakaz($id, $name="", $price, $pict, $title)
{
?>

                <div class="modal fade  text-left" id="callback_zakaz_<?=$id?>" tabindex="-1" role="dialog" aria-labelledby="callbackLabel" aria-hidden="true">
                  <div class="modal-dialog">
              <form name="sentMessage" id="callback_zakaz_<?=$id?>"  class="form-horizontal" novalidate>
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h3 style="text-align: center;"><?=$title?></h3>
                        <div class="col-md-2 col-sm-2 col-xs-2"><img src="<?=$pict?>" class="img-responsive" alt="Image"></div>
                        <div class="col-md-10  col-sm-10 col-xs-10">
                          <?=$name?>
                          <div class="price"><strong><?=$price?></strong></div>
                          </div>

                        <input type="hidden" id="nomer" name="nomer" value="<?=$name?>">
                        <input type="hidden" id="price" name="price" value="<?=$price?>">

                      </div>

                      <div class="modal-body">
                        <div id="contacts">
                          <div class="row">
                            <!-- Alignment -->
                            <div class="col-sm-offset-1 col-sm-10">
                              <div id="success_zakaz_<?=$id?>"></div> <!-- For success/fail messages -->

                                <div class="form-group control-group">
                                  <label class="col-sm-3 control-label"><?=GetMessage('form_fio')?></label>
                                  <div class="col-sm-9 controls">
                                    <input type="text" class="form-control"
                                    id="name_zakaz_<?=$id?>"
                                    value = ""
                                    required
                                    data-validation-required-message="<?=GetMessage('form_fio_error')?>" />

                                    <p class="help-block"></p>
                                  </div>
                                </div>

                                <div class="form-group control-group">
                                  <label class="col-sm-3 control-label"><?=GetMessage('form_tel')?></label>
                                  <div class="col-sm-9 controls">
                                    <input type="text"
                                    class="form-control"
                                    data-validation-regex-regex="^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{5,10}$"
                                    data-validation-regex-message="<?=GetMessage('form_tel_error_1')?>"
                                    value = ""
                                    id="phone_zakaz_<?=$id?>" required
                                    data-validation-required-message="<?=GetMessage('form_tel_error')?>" />
                                  </div>
                                </div>

<!--                                 <div class="form-group control-group">
                                  <label class="col-sm-3 control-label"><?=GetMessage('form_email')?></label>
                                  <div class="col-sm-9 controls">

                                      <input 
                                     type="email_zakaz_<?=$id?>"
                                     class="form-control"
                                     value = ""
                                     id="email_zakaz_<?=$id?>" required
                                     data-validation-email-message="<?=GetMessage('form_mail_error')?>"
                                     data-validation-required-message="<?=GetMessage('form_mail_error_1')?>"
                                     /> 

                                  </div>
                                </div> -->

                                <div class="form-group control-group">
                                  <label class="col-sm-3 control-label"><?=GetMessage('form_note')?></label>
                                  <div class="col-sm-9 controls">
                                  <textarea rows="5" cols="100" class="form-control" id="mess_zakaz_<?=$id?>" style="resize:none" ></textarea>
                                    
                                    <br>
                                    <p><input type="checkbox" name="checkme" required
                                    data-validation-required-message="<?=GetMessage('submit_y_error')?>" /> <?=getmessage('submit_y')?></p>

                                    <div class="help-block"></div>
                                    </div>

                                  </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="modal-footer" style="margin: 0">
                    <div class="col-sm-offset-1 col-sm-10" style="padding-right: 0">

                            <button type="submit" class="btn btn-default" id="'continue_z"><i class="fa fa-check"></i><?=GetMessage('form_sendmail')?></button>
                          <button type="button" class="btn" data-dismiss="modal"><i class="fa fa-times"></i><?=GetMessage('form_close')?></button>
                    </div>
                </div>
              </div>
              </form>
            </div>
          </div>

  <!-- </div> -->
                    <script>
        /*
          Jquery Validation using jqBootstrapValidation
           example is taken from jqBootstrapValidation docs
           */
           $(function() {

            $("#callback_zakaz_<?=$id?>").find('textarea,input').jqBootstrapValidation(
            {
              preventSubmit: true,
              submitError: function($form, event, errors) {
              // something to have when submit produces an error ?
              // Not decided if I need it yet
          },
          submitSuccess: function($form, event) {
              event.preventDefault(); // prevent default submit behaviour
               // get values from FORM
               var name = $("input#name_zakaz_<?=$id?>").val();
               var phone = $("input#phone_zakaz_<?=$id?>").val();
               var email = $("input#email_zakaz_<?=$id?>").val();
               var nomer = $("input#nomer").val();
               var price = $("input#price").val();

               var mess = $("textarea#mess_zakaz_<?=$id?>").val();

               var fd = new FormData();

               fd.append('name', name);
               fd.append('phone', phone);
               fd.append('email', email);
               fd.append('nomer', nomer);
               fd.append('price', price);

               fd.append('mess', mess);

               // fd.append('file', $('#file')[0].files[0]);

               var firstName = name; // For Success/Failure Message
                   // Check for white space in name for Success/Fail message
                   if (firstName.indexOf(' ') >= 0) {
                    firstName = name.split(' ').slice(0, -1).join(' ');
                   }
                      // data: {name: name, phone: phone, email: email, tirag: tirag, mess: mess, type: type, title: title, file},
                      $.ajax({
                        url: "<?=SITE_DIR?>include/recall_me_zakaz.php",
                        type: "POST",
                        data: fd,
                        processData: false,
                        contentType: false,
                        cache: false,
                        dataType: "json",
                        success: function() {
                      // Success message
                      $('#success_zakaz_<?=$id?>').html("<div class='alert alert-success'>");
                      $('#success_zakaz_<?=$id?> > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                      .append( "</button>");
                      $('#success_zakaz_<?=$id?> > .alert-success')
                      .append("<strong>"+firstName+", <?=GetMessage('form_ok')?>.</strong>");
                      $('#success_zakaz_<?=$id?> > .alert-success')
                      .append('</div>');

              //clear all fields
              $('#callback_zakaz_<?=$id?>').trigger("reset");
          },
          error: function() {
            // Fail message
            $('#success_zakaz_<?=$id?>').html("<div class='alert alert-success'>");
            $('#success_zakaz_<?=$id?> > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
            .append( "</button>");
            $('#success_zakaz_<?=$id?> > .alert-success')
            .append("<strong>"+firstName+", <?=GetMessage('form_ok')?>.</strong>");
            $('#success_zakaz_<?=$id?> > .alert-success')
            .append('</div>');

            $('#callback_zakaz_<?=$id?>').trigger("reset");
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
$('#name_zakaz').focus(function() {
  $('#success_zakaz').html('');
});

</script>

<?}?>