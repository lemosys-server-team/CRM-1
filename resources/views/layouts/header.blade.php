<div class="hdrBismillah">
	@php $bismillah_logo = getSetting('bismillah_logo'); @endphp
    @if(isset($bismillah_logo) && $bismillah_logo!=''  && \Storage::exists(config('constants.SETTING_IMAGE_URL').$bismillah_logo)) 
    <img src="{{ \Storage::url(config('constants.SETTING_IMAGE_URL').$bismillah_logo) }}" alt="Bismillah-ir-rahmannir-raheem" title="Bismillah-ir-rahmannir-raheem">
    @endif
</div>
<div class="header_menu">
	<div class="header_left_menu">
		<ul>
			<li><a href="{{ route('home') }}">Home<span class="diamond-dividersep"><img src="{{ asset('frontend-theme/img/diamond-divider-img.png') }}" alt="diamond-divider"></span></a></li>
			
			<!-- <li><a href="javascript:void(0)">Vepaar<span class="diamond-dividersep"><img src="{{ asset('frontend-theme/img/diamond-divider-img.png') }}" alt="diamond-divider"></span></a></li> -->
			<li><a href="{{ route('downloads') }}">Downloads<span class="diamond-dividersep"><img src="{{ asset('frontend-theme/img/diamond-divider-img.png') }}" alt="diamond-divider"></span></a></li>
		</ul>
	</div>
	<div class="header_main_logo">
		<a href="{{ route('home') }}">
			 		@php $logo = getSetting('logo'); @endphp
                    @if(isset($logo) && $logo!=''  && \Storage::exists(config('constants.SETTING_IMAGE_URL').$logo)) 
                    <img src="{{ \Storage::url(config('constants.SETTING_IMAGE_URL').$logo) }}" alt="AAJNODIN" title="AAJNODIN">
                    @endif
		</a>
	</div>
	<div class="header_right_menu">
		<ul>
			<li><a href="#"onclick="wopen('{{route("implinks")}}','ImpLinks',810, 600); return false;"><span class="diamond-dividersep"><img src="{{ asset('frontend-theme/img/diamond-divider-img.png') }}" alt="diamond-divider"></span>Imp. Links</a></li>
			<li><a href="#" onclick="wopen('{{route("contact")}}','Contact',810, 600); return false;"><span class="diamond-dividersep"><img src="{{ asset('frontend-theme/img/diamond-divider-img.png') }}" alt="diamond-divider"></span>Contact</a></li>
		</ul>
	</div>
</div>

