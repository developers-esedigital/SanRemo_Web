<!DOCTYPE html>
<div class="register-box"> 
    <div class="register-box-body" ng-controller="DatepickerDemoCtrl">
        <p class="login-box-msg">Nuova Offerta</p>

        <form action="<?php echo $post ?>" method="post" enctype="multipart/form-data" id="registerOferta">
            <input type="hidden" name="registro" value="1">
            <div class="form-group has-feedback">
                <label for="exampleInputEmail1">OffertSelezionaa</label>
                <?php if (isset($no)): ?>
                    <?php $u = json_decode($idmicrosite['microsite']) ?>
                    <input type="hidden" name="idmicrosite" value="<?php echo $idmicrosite['id'] ?>"><?php echo $u->it ?>
                <?php else: ?>
                    <select name="idmicrosite" data-chosen="1" data-placeholder="Seleziona Microsito" id="" class="form-control" required>
                        <option value=""></option>
                        <?php foreach ($microsites as $key => $value): ?>
                            <?php $u = json_decode($value->getNombre()) ?>
                            <option value="<?php echo $value->getIdmicrosite() ?>"><?php echo $u->it ?></option>
                        <?php endforeach ?>
                    </select>
                <?php endif ?>
            </div>
            <div class="form-group has-feedback">
                <?php foreach ($config->idiomas as $key => $value): ?>
                    <label for="">Nome <?php echo $value->nombre ?></label>
                    <input type="text" class="form-control" placeholder="Nome <?php echo $value->nombre ?>" name="nombre-<?php echo $value->letras ?>" <?php echo $key == 0 ? 'required' : '' ?>/>
                    <br>
                <?php endforeach ?>

            </div>
            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="Data" name="rango" required/>
                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <label for="exampleInputEmail1">Seleziona l'immagine principale per la Grid (versione web)  514x292</label>
                <input type="file" class="form-control" name="fotoPrincipal" placeholder="Seleziona Foto" required/>
                <div id="errorBlock43" class="help-block"></div>
            </div>
            <div class="form-group has-feedback">
                <label for="exampleInputEmail1">Seleziona l'immagine principale per Grid (versione mobile) 320x292</label>
                <input type="file" class="form-control" name="gridmovil" placeholder="Seleziona Foto" required/>
                <div id="errorBlock45" class="help-block"></div>
            </div>
            <div class="form-group has-feedback">
                <label for="exampleInputEmail1">Seleziona l'immagine principale 1876x720</label>
                <input type="file" class="form-control" name="foto" placeholder="Seleziona Foto" required/>
                <div id="errorBlock44" class="help-block"></div>
            </div>
            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="%" name="porcentaje"/>
                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">

                <?php foreach ($config->idiomas as $key => $value): ?>
                    <label for="">Descrizione <?php echo $value->nombre ?></label>
                    <textarea name="descripcion-<?php echo $value->letras ?>" id="descripcion" placeholder="Descrizione <?php echo $value->nombre ?>" class="form-control" cols="30" rows="10"  <?php echo $key == 0 ? 'required' : '' ?>></textarea>
                    <br>
                <?php endforeach ?>

            </div>
            <h3>SEO BOX</h3>

            <div class="form-group has-feedback">
                <?php foreach ($config->idiomas as $key => $value): ?>
                    <label for="">Title <?php echo $value->nombre ?></label>
                    <input type="text" class="form-control" placeholder="Title <?php echo $value->nombre ?>" name="title-<?php echo $value->letras ?>" <?php echo $key == 0 ? 'required' : '' ?>/>
                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                    <br>
                <?php endforeach ?>

            </div>
            <div class="form-group has-feedback">

                <?php foreach ($config->idiomas as $key => $value): ?>
                    <div class="input-group">
                        <?php if (isset($no)) $ttt = json_decode($idmicrosite['microsite']) ?>
                        <span class="input-group-addon" id="basic-addon">http://www.sanremo-on.com/<?php echo $value->letras ?>/news/offer/<span class="uu"><?php echo isset($no) ? clearStr(strtolower($ttt->it)) : '' ?></span>/</span>
                        <input type="text" class="form-control url-control" placeholder="URL <?php echo $value->nombre ?>" name="url-<?php echo $value->letras ?>" <?php echo $key == 0 ? 'required' : '' ?>/>
                        <span class="input-group-addon" id="basic-addon2">.html</span>
                    </div>
                    <br>
                <?php endforeach ?>

            </div>
            <div class="form-group has-feedback">

                <?php foreach ($config->idiomas as $key => $value): ?>
                    <label for="">Description <?php echo $value->nombre ?></label>
                    <textarea name="description-<?php echo $value->letras ?>" id="description" placeholder="Description <?php echo $value->nombre ?>" class="form-control" cols="30" rows="10"  <?php echo $key == 0 ? 'required' : '' ?>></textarea>
                    <br>
                <?php endforeach ?>

            </div>



            <div class="form-group has-feedback">

                <?php foreach ($idAccomodation as $key => $value): ?>
                    <?php
                    if ($value->iduser == $_SESSION['usuario']->getIduser() || $_SESSION['usuario']->getNivelusuario() == 1) {
                        ?>
                        <div class="input-group">
                            <span class="input-group-addon">
                                è un pacchetto soggiorno?
                                <input type="checkbox" aria-label="" value="activado" name="paquete">

                            </span>
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon">
                                è un offerta immobiliare?
                                <input type="checkbox" aria-label="" value="activado" name="isimmobiliare">

                            </span>
                        </div>


        <?php
        //echo "Funciono!";
        break;
    } else {
        ?>
                        <!-- <div class="input-group">
                      <span class="input-group-addon">
                        è un pacchetto soggiorno?
                        <input type="checkbox" aria-label="" value="activado" name="estatusBanner">

                      </span>
                    </div> -->
        <?php
        //echo 'funciono pero no es id de accomodation';
    }
    ?>

                <?php endforeach ?>

            </div>


            <input type="hidden" name="estatus" value="0">
            <div class="row">
                <div class="col-xs-4">
                    <button type="button" class="btn btn-primary btn-block btn-flat post_button" data-value="0">Salva</button>
                </div><!-- /.col -->
                <div class="col-xs-4">
                    <button type="button" class="btn btn-primary btn-block btn-flat" data-value="1">Pubblica</button>
                </div>
                <div class="col-xs-4">
                    <button type="button" class="btn btn-primary btn-block btn-flat" data-value="-1">Anteprima</button>
                </div>
            </div>
            <input type="hidden" name="registro" value="1">
        </form>        
    </div><!-- /.form-box -->
</div><!-- /.register-box -->
<script>
    $('[name="paquete"]').on('change', function() {
        if($('[name="isimmobiliare"]').prop("checked") == true){
            alert("Por favor marque solo una opcion de permanecer bienes raices o");
           $('[name="paquete"]').removeAttr('checked'); 
        }
});

$('[name="isimmobiliare"]').on('change', function() {
       if($('[name="paquete"]').prop("checked") == true){
           alert("Por favor marque solo una opcion de permanecer bienes raices o");
           $('[name="isimmobiliare"]').removeAttr('checked'); 
        }
});
    $('[name="porcentaje"]').on('change', function() {
        if (isNaN(parseFloat($(this).val()))) {
            alert('El Porcentaje debe ser Un numero entre 0 y 100');
            $(this).val('');
            $(this).focus();
        } else {
            if (!(parseFloat($(this).val()) > 0 && parseFloat($(this).val()) < 100)) {
                alert('El Porcentaje debe ser Un numero entre 0 y 100');
                $(this).val('');
                $(this).focus();
            }
        }
    });
    $('[name="title"]').on('keydown', function(e) {
        if (e.keyCode != 8) {
            if ($(this).val().length > 155) {
                return false;
            }
        }
    });
    $('[name="description"]').on('keydown', function(e) {
        if (e.keyCode != 8) {
            if ($(this).val().length > 155) {
                return false;
            }
        }
    })
    $('[name="url"]').on('keydown', function(e) {
        console.log(e.keyCode);
        if ((e.keyCode >= 65 && e.keyCode <= 90) || (e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode >= 96 && e.keyCode <= 105) || e.keyCode == 173 || e.keyCode == 189 || e.keyCode == 8) {
            $(this).val($(this).val().toLowerCase())
            return;
        } else {
            e.preventDefault();
            return false;
        }
    })
    $('input[name="rango"]').daterangepicker();
    $('[data-chosen="1"]').chosen({
        allow_single_deselect: true,
        width: "100%"
    });
    $('input[name="foto"]').fileinput({
        showUpload: false,
        browseClass: "btn btn-primary",
        language: 'es',
        uploadAsync: false,
        minFileCount: 1,
        maxImageWidth: 1877,
        minImageWidth: 1875,
        maxImageHeight: 721,
        minImageHeight: 719,
        allowedFileExtensions: ['jpg', 'png', 'gif'],
        elErrorContainer: "#errorBlock44",
        previewFileIcon: "<i class='glyphicon glyphicon-king'></i>"
    }); 
    $('[name="fotoPrincipal"]').fileinput({
        showUpload: false,
        browseClass: "btn btn-primary",
        language: 'es',
        uploadAsync: false,
        minFileCount: 1,
        maxImageWidth: 515,
        minImageWidth: 513,
        maxImageHeight: 293,
        minImageHeight: 291,
        allowedFileExtensions: ['jpg', 'png', 'gif'],
        elErrorContainer: "#errorBlock43",
        previewFileIcon: "<i class='glyphicon glyphicon-king'></i>"
    });
    $('[name="gridmovil"]').fileinput({
        showUpload: false,
        browseClass: "btn btn-primary",
        language: 'es',
        uploadAsync: false,
        minFileCount: 1,
        maxImageWidth: 321,
        minImageWidth: 319,
        maxImageHeight: 293,
        minImageHeight: 291,
        allowedFileExtensions: ['jpg', 'png', 'gif'],
        elErrorContainer: "#errorBlock45",
        previewFileIcon: "<i class='glyphicon glyphicon-king'></i>"
    });
    $.validator.setDefaults({ignore: ":hidden:not(select)"});
    $("#registerSeleziona").validate({
        errorPlacement: function(error, element) {
            if (element.parent('.form-group').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        }
    });
    $('button[data-value]').on('click', function() {
        $('input[name="estatus"]').val($(this).data('value'));
        if ($(this).data('value') == '-1') {
            tools.notificacion('top', 'Previsualizando...', 'success');
        }
        $('#registerOferta').submit();
    })

    $('.url-control').on('change', function() {
        $(this).val(tools.clearStr($(this).val()));
    });

    $('[name="idmicrosite"]').chosen().change(function(event) {
        $('.uu').html(tools.clearStr($('[name="idmicrosite"] option:selected').html()).toLowerCase())
    });

    $('#registerOferta').on('submit', function(evt) {
        // evt.preventDefault();
        var isvalidate = $(this).valid();
        if (!isvalidate) {
            return false;
        }
        if (!this.checkValidity()) {
            // event.preventDefault();
            return false;
        }
        if ($.isEmptyObject($('input[type="checkbox"]:checked'))) {
            $('input[type="checkbox"]').focus();
            return false;
        }
        var pru = false;
        var ele;
        $('.file-error-message').each(function(i, e) {
            console.log(i);
            if (!$(e).is(':hidden')) {
                pru = true;
                ele = e;
            }
        })
        if (pru) {
            tools.scrollTo('#' + ele.id);
            return false;
        }
        $('[required]').each(function() {
            if (!this.validity.valid) {
                $(this).focus();
                return false;
            }
        });

        $(".post_button").attr("disabled", "disabled");

        evt.preventDefault();
        var postData = new FormData();
        var files = $('input[name="foto"]').prop('files');//[0];
        var principal = $('input[name="fotoPrincipal"]').prop('files')[0];//[0];
        var movil = $('input[name="gridmovil"]').prop('files')[0];//[0];
        for (var i = 0; i < files.length; i++) {
            postData.append('galeria' + i, files[i]);
        }
        ;
        postData.append('imagePrincipal', principal);
        postData.append('gridmovil', movil);

        $('input[type="email"],input[type="text"],input[type="password"],input[type="hidden"],textarea,input[type="checkbox"]:checked,select').each(function(index, el) {
            postData.append(el.name, el.value.trim());
        });



        $.ajax({
            url: $('#registerOferta').attr('action'),
            type: "POST",
            data: postData,
            processData: false,
            contentType: false,
            success: function(data, textStatus, jqXHR) {
                console.log(data);
                if (typeof(data) == 'object') {
                    if (data.code == 200) {
                        if (data.prev) {
                            $('.post_button').prop('disabled', false);
                            window.open('//doffice.com.mx/sanremoOn/it/news/offerte/' + $('[name="url-it"]').val() + '.html', '_blank');
                        } else {
                            $('.post_button').prop('disabled', false);
                            tools.notificacion('top', data.msg, 'success');
                            tools.cargarPrincipal({url: data.url});
                        }
                        // window.location = data.url;
                    } else {
                        $('.post_button').prop('disabled', false);
                        tools.notificacion('top', data.msg, 'alert');
                    }
                } else {
                    $('.post_button').prop('disabled', false);

                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                //if fails     
            }
        });
        return false;
    })
    $('[name^="descripcion-"]').each(function(index, el) {
        text = $(el);
        text.summernote({
            height: 300,
            toolbar: [
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link']],
                ['view', ['codeview']],
            ]
        }).on('summernote.change', function(customEvent, contents, $editable) {
            $('[name="' + $(this).attr('name') + '"]').val(contents);
            $('[name="' + $(this).attr('name') + '"]').html(contents);
        })
    });
</script>

