<div class="ks-page-container">
    <div class="ks-column ks-page"> 
        <div class="ks-header">
            <section class="ks-title">
                <h3><?= $title; ?></h3>
            </section>
        </div>
        <div class="ks-content">
            <div class="ks-body ks-content-nav">
                <div class="ks-nav-body">
                    <div class="ks-nav-body-wrapper col-md-8 offset-md-2">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-12">
                                    <?php echo $this->session->flashdata('success'); ?>
                                    <?php echo $this->session->flashdata('danger'); ?>
                                </div>
                                <div class="col-lg-12">

                                    <div class="card panel">
                                        <div class="card-block">
                                            <?php echo form_open('', array('name' => 'company', 'class' => '', 'method' => 'post')); ?>
                                            <input type="hidden" name="type" value="ADD" readonly/>
                                            <div class="row">
                                                <div class="form-group col-xl-12">
                                                    <label>Company Name</label>
                                                    <input type="text"
                                                           name="host_company"
                                                           class="form-control"
                                                           placeholder="Enter host company name"
                                                           data-validation="length"
                                                           data-validation-length="3-50"
                                                           value="<?= set_value('company_name') ?>"
                                                           data-validation-error-msg="please enter host company name">
                                                    <em><?php echo form_error('f_name'); ?></em>
                                                </div> 
                                            </div>
                                             <div class="row">
                                                <div class="form-group col-xl-12">
                                                    <label>Host company url</label>
                                                    <input type="text"
                                                           name="host_company_url"
                                                           class="form-control"
                                                           placeholder="Please enter host company url"
                                                           data-validation="length"
                                                           data-validation-length="3-500"
                                                           value=""
                                                           data-validation-error-msg="please enter correct url">
                                                    <em><?php echo form_error('ref_weburl'); ?></em>
                                                </div>
                                            </div>
                                            <div id="server_namess" class="row">
                                                <div id="clonedInput1" class="row clonedInput col-xl-12">
                                                    <div class="form-group col-xl-11 ">
                                                        <label class="server-fil">Server Name 1</label>
                                                        <input type="text"
                                                               name="server_names[]"
                                                               class="form-control"
                                                               data-validation="length"
                                                               data-validation-length="3-50"
                                                               placeholder="Please enter server name"
                                                               value=""
                                                               data-validation-error-msg="User name has to be an alphanumeric value (3-50 chars)">
                                                        <em><?php echo form_error('server_names'); ?></em>
                                                    </div>
                                                    <div class="form-group col-xl-1">
                                                        <label>&ensp;</label>
                                                        <div class="actions">
                                                            <button type="button" class="clone btn btn-success"><i class='la la-plus-circle ks-icon'></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-xl-12">
                                                    <label></label>
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>
                                            <?php echo form_close(); ?>
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
<script>
    var regex = /^(.+?)(\d+)$/i;
    var cloneIndex = $(".clonedInput").length;

    function clone() {
        cloneIndex++;
        $(this).parents(".clonedInput").clone()
                .appendTo("#server_namess")
                .attr("id", "clonedInput" + cloneIndex)
                .find("*")
                .each(function () {
                    var id = this.id || "";
                    var match = id.match(regex) || [];
                    if (match.length == 3) {
                        this.id = match[1] + (cloneIndex);
                    }
                    $(this).children('.server-fil').text('Server Name ' + cloneIndex);
                })
                .children('.actions').append('<button type="button" class="remove btn btn-danger"><i class="la la-minus-circle ks-icon"></i></button>')
                .on('click', 'button.remove', remove)
                .children('.clone').remove();

    }
    function remove() {
        $(this).parents(".clonedInput").remove();
    }
    $("button.clone").on("click", clone);

    $("button.remove").on("click", remove);
</script>
