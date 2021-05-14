<!-- APP_URL=http://mspf.test -->
@extends('layouts.layout')
@section('content')
    <div class="hero">
        <div class="flex-container-1" id="home-section">
            <div class="flex-item-left">
                <div class="greet">
                    <span>Hola!  I'm</span>
                </div>
                <h2>{{ $info[0]->name }}</h2>
                <h4>{{ $info[0]->profession }}</h4>
                <ul>
                    @foreach($contacts as $contact)
                        @if($contact->name == 'Number')
                            <li><i class="{{ $contact->iconname }}"></i><a href="tel:{{ $contact->content }}">{{ $contact->content }}</a></li>
                        @elseif($contact->name == 'Email')
                            <li><i class="{{ $contact->iconname }}"></i><a href="mailto:{{ $contact->content }}">{{ $contact->content }}</a></li>
                        @else
                            <li><i class="{{ $contact->iconname }}"></i><a href="#">{{ $contact->content }}</a></li>
                        @endif
                    @endforeach
                    <!-- <li><i class="fa fa-envelope"></i><a href="">manandharsudip@gmail.com</a></li>
                    <li><i class="fa fa-map-marker"></i><a href="">&nbsp&nbspKwathandau-10, Bhaktapur, Nepal</a></li> -->
                </ul>
                <div class="social-media">
                    <ul>
                        @foreach($medias as $media)
                        <li><a target="_blank" href="{{ $media->link }}"><i class="{{ $media->iconname }}"></i></a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="flex-item-right">
                <img src="{{ asset('uploads/pp/'.$info[0]->pp ) }}" alt="">
            </div>
        </div>
        <div class="flex-container-2" id="about-section">
            <div class="flex-item-left-2">
            <img src="{{ asset('uploads/cp/'.$info[0]->cp ) }}" alt="">
            </div>
            <div class="flex-item-right-2">
                <h3>About Me</h3>
                <p>{{ $info[0]->bio }} 
                </p>
                <div class="tags-widget">
                    <ul>
                        @foreach($skills as $skill)
                            <li><a href="#">{{ $skill->skillname }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <h2 class="flex-3-heading" style="padding-top:85px; text-align:center; color:white">What I do</h2>
        <div class="flex-container-3">
            <div class="flex-item-left-3">
                <i class="fa fa-html5"></i>
                <h3>Web Development</h3>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
            </div>
            <div class="flex-item-mid-3">
                <i class="fa fa-html5"></i>
                <h3>App Development</h3>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
            </div>
            <div class="flex-item-right-3">
                <i class="fa fa-html5"></i>
                <h3>Designing</h3>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
            </div>
        </div>
        <div class="flex-container-4" id="skill-section">
            <div class="flex-item-left-4">
                <h2>Technical Skills</h2>
                <div class="skill-bar">
                    @foreach($skills as $skill)
                        <div class="bar-info">
                            <h6>{{$skill->skillname}}</h6>
                            <h6>{{$skill->skillpercent}}%</h6>
                        </div>
                        <div class="bar-container">
                            <div class="bar" id="barval" per="{{$skill->skillpercent}}" ></div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="flex-item-right-4">
                <h2>Professional Skills</h2>
                <div class="cir-probar">
                    @foreach($skillsp as $skillsp)
                        <div class="box">
                            <div class="percentage">
                                <svg>
                                    <circle cx="50" cy="50" r="50"></circle>
                                    <circle class="proval" cx="50" cy="50" r="50" per="{{$skillsp->skillpercent}}"></circle>
                                </svg>
                                <div class="number">
                                    <h2 data-info="50">{{$skillsp->skillpercent}}<span>%</span> </h2>
                                </div>
                            </div>
                            <h6 class="text">{{$skillsp->skillname}}</h6>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="flex-container-5" id="experiences-section">
            <div class="flex-item-left-5">
                <h2>Education</h2>
                <div class="education">
                    @foreach($educations as $education)
                        <div class="edu-item">
                                <h4 class="eduname">{{$education->qualification}} From <span>{{$education->institute}}</span></h4>
                                <span class="date">{{$education->startyear}} - {{$education->endyear}}</span>
                                <p class="ins-info">
                                        {{$education->description}}
                                </p>
                        </div>
                    @endforeach  
                </div>
            </div>
            <div class="flex-item-right-5">
                <h2>Work Experiences</h2>
                <div class="work">
                    @foreach($workingexps as $workingexp)
                        <div class="work-item">
                                <h4 class="insname">{{$workingexp->post}} At <span>{{$workingexp->institute}}</span></h4>
                                <span class="date">{{$workingexp->startyear}} - {{$workingexp->endyear}}</span>
                                <p class="ins-info">
                                    {{$workingexp->description}}
                                </p>
                        </div>
                    @endforeach                   
                </div>
            </div>
        </div>
        <div class="flex-container-6" id="portfolio-section">
            <div class="flex-item-top-6">
                <h3>My Portfolio</h3>
                <div class="cat-btn">
                    <button class="btn btn-default filter-button " data-filter="all">All</button>
                    @foreach($workCats as $workCat)
                        <button class="btn btn-default filter-button" data-filter="{{$workCat->id}}">{{$workCat->catname}}</button>
                    @endforeach
                </div>
            </div>
            <div class="flex-item-bottom-6">
                <div class="portfolio-grid">
                    @foreach($works as $key => $work) 
                        <div class="pf-grid-item filter {{$work->categoryid}}">
                            <img src="{{ asset('uploads/work/'.$work->workimage ) }}" alt="">
                            <div class="middle">
                                <div class="imgname">
                                    ABC
                                </div>
                                <div class="catname">
                                    BCD
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!-- <div class="pf-grid-item-2 filter 6">
                        <img src="{{ asset('uploads/pp/'.$info[0]->pp ) }}" alt="">
                    </div>
                    <div class="pf-grid-item-3 filter art">
                        <img src="{{ asset('uploads/pp/'.$info[0]->pp ) }}" alt=""> 
                    </div>
                    <div class="pf-grid-item-4 filter web">
                        <img src="{{ asset('uploads/cp/'.$info[0]->cp ) }}" alt="">
                    </div>
                    <div class="pf-grid-item-5 filter apps">
                        <img src="{{ asset('uploads/pp/'.$info[0]->pp ) }}" alt="">   
                    </div>
                    <div class="pf-grid-item-6 filter apps">
                        <img src="{{ asset('uploads/cp/'.$info[0]->cp ) }}" alt="">  
                    </div>
                    <div class="pf-grid-item-7 filter web">
                        <img src="{{ asset('uploads/pp/'.$info[0]->pp ) }}" alt="">
                    </div>
                    <div class="pf-grid-item-8 filter art">
                        <img src="{{ asset('uploads/cp/'.$info[0]->cp ) }}" alt="">
                    </div>
                    <div class="pf-grid-item-9 filter soft">
                        <img src="{{ asset('uploads/pp/'.$info[0]->pp ) }}" alt=""> 
                    </div> -->
                </div>
            </div>
        </div>
        <div class="flex-container-7" id="blog-section">
            <div class="flex-item-top-7">
                <h2 style="text-align:center; color:white">Featured Posts</h2>
            </div>
            <div class="flex-item-bottom-7">
                @foreach($blogs as $blog)
                    <div class="flex-item-left-7">
                        <img src="{{ asset('uploads/blog/'.$blog->blogimage ) }}" alt="">
                        <div class="blog-content">
                            <h3>{{$blog->blogtitle}}</h3>
                            <span class="date">{{date('d M, Y',strtotime($blog->created_at))}}</span>
                            <p>{{substr($blog->content,0,200)}}....... <a href="">readmore</a></p>
                            
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="flex-item-top-8" id="contact-section">
            <h2 style=" text-align:center; color:white">Contacts</h2>
        </div>
        <div class="flex-container-8">
            <div class="flex-item-bottom-8">
                    @foreach($contacts as $contact)
                        @if($contact->name == 'Number')
                            <div class="flex-item-left-8">    
                                <div class="blog-content">
                                    <i class="fa fa-map-marker fa-5x circle-icon"></i>
                                    <h3>{{ $contact->name }}</h3>
                                    <a style="color:white" href="tel:{{ $contact->content }}">
                                        <span class="date">{{ $contact->content }}</span>
                                    </a>                           
                                </div>
                            </div>
                        @elseif($contact->name == 'Email')
                            <div class="flex-item-left-8">    
                                <div class="blog-content">
                                    <i class="fa fa-map-marker fa-5x circle-icon"></i>
                                    <h3>{{ $contact->name }}</h3>
                                    <a style="color:white" href="mailto:{{ $contact->content }}">
                                        <span class="date">{{ $contact->content }}</span>
                                    </a>                           
                                </div>
                            </div>
                        @else
                            <div class="flex-item-left-8">    
                                <div class="blog-content">
                                    <i class="fa fa-map-marker fa-5x circle-icon"></i>
                                    <h3>{{ $contact->name }}</h3>
                                    <a style="color:white" href="#">
                                        <span class="date">{{ $contact->content }}</span>
                                    </a>                           
                                </div>
                            </div>
                        @endif
                    @endforeach
            </div>
            <div class="flex-item-ft-8">
                <div class="container">
                    <form action="/backend/Messages" method="post">
                        @csrf
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" placeholder="Your name..">

                        <label for="email">Email</label>
                        <input type="text" id="email" name="email" placeholder="Your last name..">

                        <label for="subject">Message</label>
                        <textarea id="subject" name="message" placeholder="Write something.." 			style="height:200px"></textarea>
                        <input type="hidden" name="front" value="ms10">
                        <input type="submit" value="Submit">
                    </form>
                </div>
                <div class="motiv">
                    <img src="{{ asset('uploads/pp/'.$info[0]->pp ) }}" alt=""> 
                </div>
            </div>
        </div>
    </div>
        
@endsection
