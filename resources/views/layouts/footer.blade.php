<!-- FOOTER START -->
<div class="container">
	 <div class="ftrMain clearfix">
		<div class="floatLeft_noWidth">
		<ul class="footer_cont">
			<li><a href="{{ route('home') }}">
				 @php $footer_logo = getSetting('footer_logo'); @endphp
                    @if(isset($footer_logo) && $footer_logo!=''  && \Storage::exists(config('constants.SETTING_IMAGE_URL').$footer_logo)) 
                   	<img src="{{ \Storage::url(config('constants.SETTING_IMAGE_URL').$footer_logo) }}" alt="AAJNODIN" title="AAJNODIN" />
                    @endif
    		  </a>
    	    </li>
			<li>
				<a href="#" onclick="wopen('{{route("contact")}}','Contact',810, 600); return false;">Contact Us</a><span class="diamond-dividersep"><img src="{{ asset('frontend-theme/img/diamond-divider-img.png') }}" alt="diamond-divider"/></span>
			</li>
			
   		</ul>
        </div>
		   <div class="floatright_noWidth">
		   <span class="footer-copyright">Copyright &copy; <?php echo @date('Y'); ?></span>	
			</div>
		</div>
	   </div>
	</div>
</div>
<!-- FOOTER END -->




           
                
                
