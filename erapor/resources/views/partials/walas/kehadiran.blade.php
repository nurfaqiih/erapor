<div id="kehadiran" 
    class="modal fade bs-example-modal-lg" 
    tabindex="-1" 
    role="dialog" 
    aria-labelledby="Kehadiran"
>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            	<div class="text-center" id="loading" v-if="loading">
                	<h3>Loading Data, Please Wait ...</h3>
                	<i class="fa fa-refresh fa-spin fa-3x"></i>
            	</div>
            	<div v-if="!loading">
            		<div class="modal-header">
            			<div class="row">
		        	        <div class="col-md-6">
    		        	        <div class="col-md-5">
        		        	        <p>Nama Peserta Didik</p>
            	        		    <p>NISN </p>
	        	    	        </div>
    	        	    		<div class="col-md-7">
	        	    	            <p>: @{{student.name}}</p>
    	        	    	        <p>: @{{student.nis}}</p>
     		   	        	    </div>    
	        		        </div>
    	        		    <div class="col-md-4 col-md-offset-2">
        	        		    <div class="col-sm-6">
		            	            <p>Tahun Ajar</p>
    		            	        <p>Semester</p>
	    		                </div>                
    	    		            <div class="col-sm-6">
        	    		            <p>: @{{kehadiran.year}}</p>
	            		            <p>: @{{kehadiran.semester}}</p>
    	            	    	</div>
        	        		</div>
	        	    	</div>
	                </div>
    	            <form method="POST" v-on="submit: update">
        	        	<div class="modal-body">
            	    		@include('partials.walas.blangko')
                		</div>
	                	<div class="modal-footer">
	                		<button type="submit" class="btn btn-info">
	                			<span class="fa fa-save"></span> Simpan
	                		</button>
        	        	</div>	
            	    </form>
            	</div>
                
            </div>
        </div>
</div>