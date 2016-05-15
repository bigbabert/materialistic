<form id="searchform" class="form-horizontal" method="get" action="<?php echo esc_url( home_url() ); ?>/">
<div class="form-group">
    <div class="col-md-12">
        <div class="col-md-6">
        <input type="text" value="<?php print __( 'Search this site', 'materialistic' );?>" onblur="if(this.value == '') {this.value = '<?php print __('Search this site', 'materialistic');?>';}" onfocus="if(this.value == '<?php print __('Search this site', 'materialistic');?>') {this.value = '';}" name="s" id="s" size="25" class="form-control" />        
        <span class="material-input"></span>
        </div>
        <div class="col-md-6">
        <input type="submit" id="searchsubmit" value="<?php print  __('Search', 'materialistic');?>" class="submit" name="searchsubmit"/>
        <span class="material-input"></span>
        </div>
    </div>
</div>
</form>