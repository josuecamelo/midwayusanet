@extends('site.main')

@section('css')
	<style>
		#charities h1 {
			background: url({{ asset('img/charities-banner.jpg') }}) top right;
			padding: 150px;
			color: #FFF;
			text-shadow: 0 5px 15px rgba(0,0,0,0.7);
			font-size: 72px;
			margin-bottom: 40px;
		}

		@media(max-width: 600px) {
			#charities h1 {
				padding: 100px;
				font-size: 50px;
			}
		}

		.bgParallax {
			margin: 0 auto;
			width: 100%;
			min-height: 100%;
			background-position: 50% 0;
			background-repeat: repeat;
			background-attachment: fixed;
		}

		.img-circular {
			border-radius: 50%;
			width: 150px;
			height: 150px;
			transition: all .25s ease;
		}

		.img-circular:hover {
			transform: scale(1.15);
		}

		#charities .col-md-3 {
			text-align: center;
		}

		#charities p {
			text-align: justify;
		}
	</style>
@endsection

@section('main')

	<article id="charities">

		<h1 class="bgParallax animated fadeInDown" data-speed="5">Giving Back</h1>

		<div class="container animated fadeInUp">

			<div class="row">
				<div class="col-md-12">
					<p><b>Military Trail</b> is the line of products created to honor those who always have to be physically prepared to defend us. While risking their lives daily they must always be ready for any challenge.</p>
					<p>In honor of the brave men and women who are active-duty or veterans of the U.S. Military and law enforcement. 5% of u.s. gross sales proceeds for military trail will be donated to charities that support our active service members, veterans, law enforcement and their families.*</p>
				</div>
			</div>

			<div class="row">
				<div class="col-md-3">
					<a href="https://www.wwfs.org/" target="_blank"><img src="http://midwaylabsusa.com/wp-content/uploads/2017/05/Wound.png" alt="Wounded Warriors Family Support" class="img-circular"></a>
				</div>
				<div class="col-md-9">
					<h3>Wounded Warriors Family Support</h3>
					<p></p>
					<p>Wounded Warriors Family Support (WWFS) is an independent nonprofit organization whose mission is to improve the quality of life for the families of our combat wounded. Having earned Charity Navigator’s highest four-star rating, WWFS aids veterans and their families in healing the wounds that medicine cannot.</p>
					<p>Wounded Warriors Family Support serves veterans and their families across the country in a variety of ways: Respite, Family Retreats, Mobility-equipped Vehicles and Veterans WeldingTraining.</p>
					<p></p>
					<p><a href="https://www.wwfs.org/" target="_blank">https://www.wwfs.org/</a></p>
				</div>
			</div>

			<div class="row">
				<div class="col-md-3">
					<a href="https://www.asymca.org/" target="_blank"><img src="http://midwaylabsusa.com/wp-content/uploads/2017/05/TheY.png" alt="Armed Services YMCA of the USA (“ASYMCA”)" class="img-circular"></a>
				</div>
				<div class="col-md-9">
					<h3>Armed Services YMCA of the USA (“ASYMCA”)</h3>
					<p></p>
					<p>We provide hands-on, innovative, specialized programs and support services to military service members and their families with a particular focus on junior-enlisted men and women — the individuals on the front lines of defending our nation. Programs are offered at low cost and require no dues or membership fees. The programs, services, and events we provide are designed to help the family come together, stay together, and have the ability to adjust, bounce back, and thrive wherever the services sends them.</p>
					<p></p>
					<p><a href="https://www.asymca.org/" target="_blank">https://www.asymca.org/</a></p>
				</div>
			</div>

			<div class="row">
				<div class="col-md-3">
					<a href="http://www.racingforheroes.org/" target="_blank"><img src="http://midwaylabsusa.com/wp-content/uploads/2017/05/RACER.png" alt="Racing For Heroes, Inc." class="img-circular"></a>
				</div>
				<div class="col-md-9">
					<h3>Racing For Heroes, Inc.</h3>
					<p></p>
					<p>"Racing For Heroes’ integrates military veterans into motorsports with the primary focus is on suicide prevention, through assistance to disabled combat veterans with Post Traumatic Stress Disorder (PTSD) and Traumatic Brain Injuries (TBI). With 22 veteran suicides per day, time is not on our side. These brave men and women transition back home feeling alone and isolated, with an overall lack of purpose in life. We provide hope and effective resources to assist in the recovery of their visible and invisible wounds. Participants are provided with a new mission and lifestyle, in a safe community with a true sense of belonging. While with us, they are able to learn new occupational and coping skills from experienced veterans who have overcome the same struggles. Unlike many other programs, one of our key staff members is a Licensed Professional Counselor, specializing in PTSD and TBI who is also a disabled combat veteran. This ensures ongoing mental health support to both Racing For Heroes participants and their families, who are also included in our programs and services."</p>
					<p></p>
					<p><a href="http://www.racingforheroes.org/" target="_blank">http://www.racingforheroes.org/</a></p>
				</div>
			</div>

			<div class="row">
				<div class="col-md-3">
					<a href="http://www.militaryfamily.org/" target="_blank"><img src="http://midwaylabsusa.com/wp-content/uploads/2017/05/NMFA_Final.png" alt="National Military Family Association" class="img-circular"></a>
				</div>
				<div class="col-md-9">
					<h3>National Military Family Association</h3>
					<p></p>
					<p>The National Military Family Association is the leading nonprofit dedicated to serving the families who stand behind the uniform. Since 1969, NMFA has worked to strengthen and protect millions of families through its advocacy and programs. They provide spouse scholarships, camps for military kids, and retreats for families reconnecting after deployment and for the families of the wounded, ill, or injured. NMFA serves the families of the currently serving, retired, wounded or fallen members of the Army, Navy, Marine Corps, Air Force, Coast Guard, and Commissioned Corps of the USPHS and NOAA. To get involved or to learn more, visit </p>
					<p></p>
					<p><a href="http://www.militaryfamily.org/" target="_blank">http://www.militaryfamily.org/</a></p>
				</div>
			</div>

			<div class="row">
				<div class="col-md-3">
					<a href="http://labsforliberty.org/" target="_blank"><img src="http://midwaylabsusa.com/wp-content/uploads/2017/05/LAB4.png" alt="Labs 4 Liberty" class="img-circular"></a>
				</div>
				<div class="col-md-9">
					<h3>Labs 4 Liberty</h3>
					<p></p>
					<p>We are raising and training Labrador retrievers to be gifted as service dogs to deserving war Veterans. We have chosen to specifically breed Labrador retrievers that are calm, intelligent, patient, obedient, and devoted. The dogs are also bred for their natural hunting ability. These service dogs’ primary focus must be their veteran and the tasks they perform for that veteran. They will also be capable of serving as a hunting companion to those veterans who find healing through hunting and outdoor activities.</p>
					<p></p>
					<p><a href="http://labsforliberty.org/" target="_blank">http://labsforliberty.org/</a></p>
				</div>
			</div>

			<div class="row">
				<div class="col-md-3">
					<a href="https://americanheroadventures.org/" target="_blank"><img src="http://midwaylabsusa.com/wp-content/uploads/2017/05/Adventure.png" alt="American Hero Adventures" class="img-circular"></a>
				</div>
				<div class="col-md-9">
					<h3>American Hero Adventures</h3>
					<p></p>
					<p>American Hero Adventures is an organization founded For Heroes, By Heroes; dedicated to “Providing Our Nation’s Finest and Their Loved Ones with Adventures of a Lifetime”. We aim to provide the adventures to the Heroes and their loved ones so that they may enjoy life and experience adventure as they once did before their lives were so drastically altered. Through adventure we are able to show these Heroes hope, healing and camaraderie and give them an outlet to share and build on one another experiences. </p>
					<p></p>
					<p><a href="https://americanheroadventures.org/" target="_blank">https://americanheroadventures.org/</a></p>
				</div>
			</div>

			<div class="row">
				<div class="col-md-3">
					<a href="https://www.22kill.com/" target="_blank"><img src="http://midwaylabsusa.com/wp-content/uploads/2017/05/22K.png" alt="22Kill" class="img-circular"></a>
				</div>
				<div class="col-md-9">
					<h3>22Kill</h3>
					<p></p>
					<p>22KILL is a global movement bridging the gap between veterans and civilians to build a community of support.<br>
						22KILL works to raise awareness to the suicide epidemic that is plaguing our country, and educate the public on mental health issues such as PTS. 22KILL also serves as a resource for veterans, and continues to build on its network of like-minded organizations to be able to connect veterans with programs and services in their local area. Funds raised through merchandise sales and donations are used to support partnered organizations who offer programs focusing on veteran empowerment, mental health treatment, and therapy/counseling for veterans and their families.</p>
					<p></p>
					<p><a href="https://www.22kill.com/" target="_blank">https://www.22kill.com/</a></p>
				</div>
			</div>

			<div class="row">
				<div class="col-md-3">
					<a href="http://honoringamericaswarriors.org/" target="_blank"><img src="http://midwaylabsusa.com/wp-content/uploads/2017/05/HAW.png" alt="Honoring America’s Warriors" class="img-circular"></a>
				</div>
				<div class="col-md-9">
					<h3>Honoring America’s Warriors</h3>
					<p></p>
					<p>Honoring Americas Warriors is a 501(c) (3) non-profit tax-exempt organization dedicated to supporting the physical, mental, and spiritual wellness services to our nation’s veterans. Honoring Americas Warriors provides teams of disabled/retired veterans a new mission to be back in-service dress uniform to provide/augment military funeral honors for honorably discharged veterans that have served this country.<br>
						Honoring Americas Warriors also provides direct support to our nation’s heroes in the areas of outdoor sporting activities, adaptive sports, mental health &amp; spiritual wellness, family &amp; couples gatherings, service/companion dog placement, employment as well as prevention of veteran suicide, and “Homes for Warriors” program.<br>
						Honoring Americas Warriors works with community leaders, elected officials and legislators, and other non-profit organizations to enhance veteran's awareness and promote veteran's initiatives.</p>
					<p></p>
					<p><a href="http://honoringamericaswarriors.org/" target="_blank">http://honoringamericaswarriors.org/</a></p>
				</div>
			</div>

			<div class="row">
				<div class="col-md-3">
					<a href="http://www.vetdogs.org/" target="_blank"><img src="http://midwaylabsusa.com/wp-content/uploads/2017/05/AVD.png" alt="American Veteran Dog" class="img-circular"></a>
				</div>
				<div class="col-md-9">
					<h3>American Veteran Dog</h3>
					<p></p>
					<p>The service dog programs of America’s VetDogs® were created to provide enhanced mobility and renewed independence to veterans, active-duty service members, and first responders with disabilities, allowing them to once again live with pride and self-reliance. Not only does a service dog provide support with daily activities, it provides the motivation to tackle new challenges. </p>
					<p></p>
					<p><a href="http://www.vetdogs.org/" target="_blank">http://www.vetdogs.org/</a></p>
				</div>
			</div>

			<div class="row">
				<div class="col-md-3">
					<a href="http://www.connectedwarriors.org/" target="_blank"><img src="http://midwaylabsusa.com/wp-content/uploads/2017/05/CW.png" alt="Connected Warriors" class="img-circular"></a>
				</div>
				<div class="col-md-9">
					<h3>Connected Warriors</h3>
					<p></p>
					<p>Connected Warriors provide evidence based trauma conscious yoga therapy to service members, veterans, and their families at no cost to participants.</p>
					<p></p>
					<p><a href="http://www.connectedwarriors.org/" target="_blank">http://www.connectedwarriors.org/</a></p>
				</div>
			</div>

			<div class="row">
				<div class="col-md-3">
					<a href="https://www.nationalcops.org/" target="_blank"><img src="http://midwaylabsusa.com/wp-content/uploads/2017/05/CPS.png" alt="C.O.P.S - Concerns of Police Survivors" class="img-circular"></a>
				</div>
				<div class="col-md-9">
					<h3>C.O.P.S - Concerns of Police Survivors</h3>
					<p></p>
					<p>Rebuilding shattered lives of survivors and co-workers affected by line of duty deaths, through partnerships with law enforcement and the community.</p>
					<p></p>
					<p><a href="https://www.nationalcops.org/" target="_blank">https://www.nationalcops.org/</a></p>
				</div>
			</div>
		</div>
	</article>
@endsection

@section('js')
	<script>
		$('.bgParallax').each(function () {
			var $obj = $(this);

			$(window).scroll(function () {
				var yPos = -($(window).scrollTop() / $obj.data('speed'));
				console.log(yPos);
				var bgpos = '100% ' + yPos + 'px';

				$obj.css('background-position', bgpos);

			});
		});
	</script>
@endsection