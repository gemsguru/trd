					<?php foreach($Company as $company){?>
			            <p class="adfont1"><strong>Products Guarantee</strong></p>
			            <div class="inline1 center">
			                <p class="adfont2"><strong>Period</strong> <?php echo $company['gaurantee_period'];?></p>
			            </div>
			            <p class="adfont2"><strong>Terms</strong></p>
			            <p class="adfont2"><?php echo $company['gaurantee_term'];?></p>
			            <p class="be1"><hr /></p>
			            <br>
			            <p class="adfont1"><strong>Products Certificates</strong></p>
			            <p class="adfont2"><strong>The Seller is able to issues the following certificates:</strong></p>
			            <p class="adfont2"><?php echo $company['product_certs'];?></p>
			            <p class="be1"><hr /></p>
			            <br>
			            <p class="adfont1"><strong>Export & Shipping</strong></p>
			            <p class="adfont2"><strong><?php if(!empty($company['export_lic_number'])){?>The Seller has an export license and able to export & ship orders under his company license<?php }?></strong></p>
			            <p class="be1"><hr/></p>
					<?php } ?>