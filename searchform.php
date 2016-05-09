<form id="searchform" class="form-horizontal" method="get" action="<?php bloginfo('url'); ?>/">
<div class="form-group">
    <div class="col-md-12">
        <div class="col-md-6">
        <input type="text" value="<?php print __( 'Search this site', 'material_at' );?>" onblur="if(this.value == '') {this.value = '<?php print __('Search this site', 'material_at');?>';}" onfocus="if(this.value == '<?php print __('Search this site', 'material_at');?>') {this.value = '';}" name="s" id="s" size="25" class="form-control" />        
        <span class="material-input"></span>
        </div>
        <div class="col-md-6">
        <input type="submit" id="searchsubmit" value="<?php print  __('Search', 'material_at');?>" class="submit" name="searchsubmit"/>
        <span class="material-input"></span>
        </div>
    </div>
</div>
</form>