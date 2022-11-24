@extends('layouts.app_front')
@section('content')
    @include('global.header')
    <div class="jumbotron jumbotron-fluid page-header position-relative overlay-bottom" style="margin-bottom: 90px;">
        <div class="container text-center py-5">
            <h1 class="text-white display-1">Course Detail</h1>
            <div class="d-inline-flex text-white mb-5">
                <p class="m-0 text-uppercase"><a class="text-white" href="">Home</a></p>
                <i class="fa fa-angle-double-right pt-1 px-3"></i>
                <p class="m-0 text-uppercase">Course Detail</p>
            </div>
        </div>
    </div>
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-8">
                    <div class="mb-5">
                        <div class="section-title position-relative mb-5">
                            <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Course Detail</h6>
                            <h1 class="display-4">Bartending NC II</h1>
                        </div>
                        {{ HTML::image('img/courses-1.jpg', '', array('class'=>'img-fluid rounded w-100 mb-4')) }}
                        <p>Bartenders also usually serve as the public image of the bar they tend, contributing to as well as reflecting the atmosphere of the bar. In establishments focused more on food, this can mean the bartender is all but invisible. On the other extreme, 
						some establishments make the bartender part of the entertainment, expecting him perhaps to engage in flair bartending or other forms of entertainment such as those exemplified in films such as Cocktail or Coyote Ugly. Some bars might be known for bartenders which serve the drinks and otherwise let a patron alone, while others want their bartenders to be good listeners and offer counselling (or a "shoulder to cry on") as required. Good bartenders help provide a steady clientèle by remembering the favoured drinks of regulars, having recommendations on hand for local night life beyond the bar, or other unofficial duties. They are sometimes called upon for answers to a wide variety of questions on topics such as sports trivia, directions or the marital status of other patrons.</p>
                        
                        <p>As stated before, a bartender is not a simple autonomous drink mixer; he/she is the most important figure in the establishment. He/she must make patrons of the establishment feel welcome, secure, and relaxed. To the patrons of a bar, the bartender is a very powerful figure. Bartenders must keep their work area clean. 
						Counter tops and tables must be cleaned with disinfectant, soap and water. Outside furniture must also be wiped at the start of the day. Refer to your opening/shift change/closing checklist ensuring ALL duties are complete. Make sure people drink responsibly.

                        Bartending is providing excellent service to guest that enters the bar. A good bartender is one who is always ready to greet a guest, accommodate to their needs and serve them with respect and professionalism. When providing service to a patron the bartender should always maintain a cheerful and kind attitude, being able to quickly take a guest's order, prepare the order and complete the transaction in a timing manner that's precise.
 
                        Approach the guest as they enter the entry to your establishment and greet with a smile. Always acknowledge a guest if you are busy with another order or guest. Let them know, "you'll be right with them". Also, bus tables, bar tops and wipe down at all times during the shift. There should be no empty bottles/glasses etc.. left on tables or counters for an extended period. Wash dishes as you go, do not let them stack up as it looks dirty and unorganized.</p>
                    </div>

                    <h2 class="mb-3">Related Courses</h2>
                    <div class="owl-carousel related-carousel position-relative" style="padding: 0 30px;">
                        <a class="courses-list-item position-relative d-block overflow-hidden mb-2" href="#">
                            {{ HTML::image('img/courses-5.jpg', '', array('class'=>'img-fluid')) }}
                            <div class="courses-text">
                                <h4 class="text-center text-white px-3">Food And Beverage Services NC II</h4>
                                <div class="border-top w-100 mt-3">
                                    <div class="d-flex justify-content-between p-4">
                                        <span class="text-white"><i class="fa fa-user mr-2"></i>Jhon Doe</span>
                                        <span class="text-white"><i class="fa fa-star mr-2"></i>4.5
                                            <small>(250)</small></span>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a class="courses-list-item position-relative d-block overflow-hidden mb-2" href="#">
                            {{ HTML::image('img/courses-4.jpeg', '', array('class'=>'img-fluid')) }}
                            <div class="courses-text">
                                <h4 class="text-center text-white px-3">Cookery NC II</h4>
                                <div class="border-top w-100 mt-3">
                                    <div class="d-flex justify-content-between p-4">
                                        <span class="text-white"><i class="fa fa-user mr-2"></i>Jhon Doe</span>
                                        <span class="text-white"><i class="fa fa-star mr-2"></i>4.5
                                            <small>(250)</small></span>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a class="courses-list-item position-relative d-block overflow-hidden mb-2" href="#">
                            {{ HTML::image('img/courses-3.jpg', '', array('class'=>'img-fluid')) }}
                            <div class="courses-text">
                                <h4 class="text-center text-white px-3">Bread And Pastry Production NC II</h4>
                                <div class="border-top w-100 mt-3">
                                    <div class="d-flex justify-content-between p-4">
                                        <span class="text-white"><i class="fa fa-user mr-2"></i>Jhon Doe</span>
                                        <span class="text-white"><i class="fa fa-star mr-2"></i>4.5
                                            <small>(250)</small></span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
               </div>

                <div class="col-lg-4 mt-5 mt-lg-0">
                    <div class="bg-primary mb-5 py-3">
                        
                        <h5 class="text-white py-3 px-4 m-0">Course Application</h5>
                        <div class="py-3 px-4">
                            <a class="btn btn-block btn-secondary py-3 px-5" href="">Enroll Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('global.footer')
@endsection