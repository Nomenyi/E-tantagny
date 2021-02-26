<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container">
     
            <div class="table-responsive">
            <table class="table table-hover tablesorter">
                <thead>
                    <tr>
                        <th class="header">First Name</th>
                        <th class="header">Last Name</th>                           
                        <th class="header">Email</th>                      
                        <th class="header">DOB</th>
                        <th class="header">Contact Name</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($export_list) && !empty($export_list)) {
                        foreach ($export_list as $key => $list) {
                            ?>
                            <tr>
                                <td><?php echo $list->matiere_id; ?></td>   
                                <td><?php echo $list->matiere_fullname; ?></td> 
                                <td><?php echo $list->matiere_abrev; ?></td> 
                            </tr>
                            <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="5">There is no employee.</td>    
                        </tr>
                    <?php } ?>
        
                </tbody>
            </table>
            <a class="pull-right btn btn-primary btn-xs" href="<?php echo base_url('ExportControllers/generateXls') ?>"><i class="fa fa-file-excel-o"></i> Export Data</a>
            </div> 
        </div>
	</div>
