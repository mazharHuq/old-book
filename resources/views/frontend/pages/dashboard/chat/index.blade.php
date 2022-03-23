@section('page-title')
    Chat
@endsection


@extends('frontend.pages.dashboard.layouts.main')

@section('user-section')
    @include('backend.layouts.partials.alerts')
    <!-- BEGIN: Content -->
    <div class="content">

        <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                Chat
            </h2>
            <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                <button class="button text-white bg-theme-1 shadow-md mr-2">Start New Chat</button>
                <div class="dropdown relative ml-auto sm:ml-0">
                    <button class="dropdown-toggle button px-2 box text-gray-700">
                        <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4"
                                                                                   data-feather="plus"></i> </span>
                    </button>
                    <div class="dropdown-box mt-10 absolute w-40 top-0 right-0 z-20">
                        <div class="dropdown-box__content box p-2">
                            <a href=""
                               class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">
                                <i data-feather="users" class="w-4 h-4 mr-2"></i> Create Group </a>
                            <a href=""
                               class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">
                                <i data-feather="settings" class="w-4 h-4 mr-2"></i> Settings </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="intro-y chat grid grid-cols-12 gap-5 mt-5">
            <!-- BEGIN: Chat Side Menu -->
            <div class="col-span-12 lg:col-span-4 xxl:col-span-3">
                <div class="intro-y pr-1">
                    <div class="box p-2">
                        <div class="chat__tabs nav-tabs justify-center flex">
                            <a data-toggle="tab" data-target="#chats" href="javascript:"
                               class="flex-1 py-2 rounded-md text-center active">Chats</a>
                            <a data-toggle="tab" data-target="#friends" href="javascript:"
                               class="flex-1 py-2 rounded-md text-center">Friends</a>
                            <a data-toggle="tab" data-target="#profile" href="javascript:"
                               class="flex-1 py-2 rounded-md text-center">Profile</a></div>
                    </div>
                </div>
                <div class="tab-content">
                    <div class="tab-content__pane active" id="chats">

                        <div class="chat__chat-list overflow-y-auto scrollbar-hidden pr-1 pt-1 mt-4">

                            @foreach($chatRoom as $user)
                                @php
                                 $reciever=\App\Models\Chat::reciever($user);



                                @endphp

                                <div class="intro-x cursor-pointer box relative flex items-center p-5 ">
                                    <div class="w-12 h-12 flex-none image-fit mr-1">
                                        <img alt="" class="rounded-full" src="{{asset('image/user.png')}}">
                                        <div
                                            class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                                    </div>

                                    <div class="ml-2 overflow-hidden">
                                        <div class="flex items-center">
                                            <a href="{{route('user.chat.show',$user->id)}}"
                                               class="font-medium">{{$reciever->name}}</a>
                                            <div class="text-xs text-gray-500 ml-auto">01:10 PM</div>
                                        </div>
                                        <div class="w-full truncate text-gray-600">
                                            @if($user->message && $user->message->last())
                                                {{$user->message->last()->message}}
                                            @else
                                                Start a New chat
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                    <div class="tab-content__pane" id="friends">
                        <div class="pr-1">
                            <div class="box p-5 mt-5">
                                <div class="relative text-gray-700">
                                    <input type="text"
                                           class="input input--lg w-full bg-gray-200 pr-10 placeholder-theme-13"
                                           placeholder="Search for messages or users...">
                                    <i class="w-4 h-4 hidden sm:absolute my-auto inset-y-0 mr-3 right-0"
                                       data-feather="search"></i>
                                </div>
                                <button type="button" class="button w-full bg-theme-1 text-white mt-3">Invite Friends
                                </button>
                            </div>
                        </div>
                        <div class="chat__user-list overflow-y-auto scrollbar-hidden pr-1 pt-1">
                            <div class="mt-4 text-gray-600">A</div>
                            <div class="cursor-pointer box relative flex items-center p-5 mt-5">
                                <div class="w-12 h-12 flex-none image-fit mr-1">
                                    <img alt="" class="rounded-full" src="dist/images/profile-4.jpg">
                                    <div
                                        class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                                </div>
                                <div class="ml-2 overflow-hidden">
                                    <div class="flex items-center"><a href="" class="font-medium">John Travolta</a>
                                    </div>
                                    <div class="w-full truncate text-gray-600">Last seen 2 hours ago</div>
                                </div>
                                <div class="dropdown relative ml-auto">
                                    <a class="dropdown-toggle w-5 h-5 block" href="javascript:"> <i
                                            data-feather="more-horizontal" class="w-5 h-5 text-gray-700"></i> </a>
                                    <div class="dropdown-box mt-5 absolute w-40 top-0 right-0 z-20">
                                        <div class="dropdown-box__content box p-2">
                                            <a href=""
                                               class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">
                                                <i data-feather="share-2" class="w-4 h-4 mr-2"></i> Share Contact </a>
                                            <a href=""
                                               class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">
                                                <i data-feather="copy" class="w-4 h-4 mr-2"></i> Copy Contact </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="cursor-pointer box relative flex items-center p-5 mt-5">
                                <div class="w-12 h-12 flex-none image-fit mr-1">
                                    <img alt="Midone Tailwind HTML Admin Template" class="rounded-full"
                                         src="dist/images/profile-13.jpg">
                                    <div
                                        class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                                </div>
                                <div class="ml-2 overflow-hidden">
                                    <div class="flex items-center"><a href="" class="font-medium">Robert De Niro</a>
                                    </div>
                                    <div class="w-full truncate text-gray-600">Last seen 2 hours ago</div>
                                </div>
                                <div class="dropdown relative ml-auto">
                                    <a class="dropdown-toggle w-5 h-5 block" href="javascript:"> <i
                                            data-feather="more-horizontal" class="w-5 h-5 text-gray-700"></i> </a>
                                    <div class="dropdown-box mt-5 absolute w-40 top-0 right-0 z-20">
                                        <div class="dropdown-box__content box p-2">
                                            <a href=""
                                               class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">
                                                <i data-feather="share-2" class="w-4 h-4 mr-2"></i> Share Contact </a>
                                            <a href=""
                                               class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">
                                                <i data-feather="copy" class="w-4 h-4 mr-2"></i> Copy Contact </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 text-gray-600">B</div>
                            <div class="cursor-pointer box relative flex items-center p-5 mt-5">
                                <div class="w-12 h-12 flex-none image-fit mr-1">
                                    <img alt="Midone Tailwind HTML Admin Template" class="rounded-full"
                                         src="dist/images/profile-12.jpg">
                                    <div
                                        class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                                </div>
                                <div class="ml-2 overflow-hidden">
                                    <div class="flex items-center"><a href="" class="font-medium">Leonardo DiCaprio</a>
                                    </div>
                                    <div class="w-full truncate text-gray-600">Last seen 2 hours ago</div>
                                </div>
                                <div class="dropdown relative ml-auto">
                                    <a class="dropdown-toggle w-5 h-5 block" href="javascript:"> <i
                                            data-feather="more-horizontal" class="w-5 h-5 text-gray-700"></i> </a>
                                    <div class="dropdown-box mt-5 absolute w-40 top-0 right-0 z-20">
                                        <div class="dropdown-box__content box p-2">
                                            <a href=""
                                               class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">
                                                <i data-feather="share-2" class="w-4 h-4 mr-2"></i> Share Contact </a>
                                            <a href=""
                                               class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">
                                                <i data-feather="copy" class="w-4 h-4 mr-2"></i> Copy Contact </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="cursor-pointer box relative flex items-center p-5 mt-5">
                                <div class="w-12 h-12 flex-none image-fit mr-1">
                                    <img alt="Midone Tailwind HTML Admin Template" class="rounded-full"
                                         src="dist/images/profile-4.jpg">
                                    <div
                                        class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                                </div>
                                <div class="ml-2 overflow-hidden">
                                    <div class="flex items-center"><a href="" class="font-medium">Sylvester Stallone</a>
                                    </div>
                                    <div class="w-full truncate text-gray-600">Last seen 2 hours ago</div>
                                </div>
                                <div class="dropdown relative ml-auto">
                                    <a class="dropdown-toggle w-5 h-5 block" href="javascript:"> <i
                                            data-feather="more-horizontal" class="w-5 h-5 text-gray-700"></i> </a>
                                    <div class="dropdown-box mt-5 absolute w-40 top-0 right-0 z-20">
                                        <div class="dropdown-box__content box p-2">
                                            <a href=""
                                               class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">
                                                <i data-feather="share-2" class="w-4 h-4 mr-2"></i> Share Contact </a>
                                            <a href=""
                                               class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">
                                                <i data-feather="copy" class="w-4 h-4 mr-2"></i> Copy Contact </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="cursor-pointer box relative flex items-center p-5 mt-5">
                                <div class="w-12 h-12 flex-none image-fit mr-1">
                                    <img alt="Midone Tailwind HTML Admin Template" class="rounded-full"
                                         src="dist/images/profile-11.jpg">
                                    <div
                                        class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                                </div>
                                <div class="ml-2 overflow-hidden">
                                    <div class="flex items-center"><a href="" class="font-medium">Angelina Jolie</a>
                                    </div>
                                    <div class="w-full truncate text-gray-600">Last seen 2 hours ago</div>
                                </div>
                                <div class="dropdown relative ml-auto">
                                    <a class="dropdown-toggle w-5 h-5 block" href="javascript:"> <i
                                            data-feather="more-horizontal" class="w-5 h-5 text-gray-700"></i> </a>
                                    <div class="dropdown-box mt-5 absolute w-40 top-0 right-0 z-20">
                                        <div class="dropdown-box__content box p-2">
                                            <a href=""
                                               class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">
                                                <i data-feather="share-2" class="w-4 h-4 mr-2"></i> Share Contact </a>
                                            <a href=""
                                               class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">
                                                <i data-feather="copy" class="w-4 h-4 mr-2"></i> Copy Contact </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content__pane" id="profile">
                        <div class="pr-1">
                            <div class="box px-5 py-10 mt-5">
                                <div class="w-20 h-20 flex-none image-fit rounded-full overflow-hidden mx-auto">
                                    <img alt="Midone Tailwind HTML Admin Template" src="dist/images/profile-4.jpg">
                                </div>
                                <div class="text-center mt-3">
                                    @php $thiss=auth('web')->user();  @endphp
                                    <div class="font-medium text-lg">{{$thiss->name}}</div>
                                    <div class="text-gray-600 mt-1">Book Roy </div>
                                </div>
                            </div>
                            <div class="box p-5 mt-5">
                                <div class="flex items-center border-b pb-5">
                                    <div class="">
                                        <div class="text-gray-600">Country</div>
                                        <div>New York City, USA</div>
                                    </div>
                                    <i data-feather="globe" class="w-4 h-4 text-gray-600 ml-auto"></i>
                                </div>
                                <div class="flex items-center border-b py-5">
                                    <div class="">
                                        <div class="text-gray-600">Phone</div>
                                        <div>{{$thiss->phone}}</div>
                                    </div>
                                    <i data-feather="mic" class="w-4 h-4 text-gray-600 ml-auto"></i>
                                </div>
                                <div class="flex items-center border-b py-5">
                                    <div class="">
                                        <div class="text-gray-600">Email</div>
                                        <div>{{$thiss->email}}</div>
                                    </div>
                                    <i data-feather="mail" class="w-4 h-4 text-gray-600 ml-auto"></i>
                                </div>
                                <div class="flex items-center pt-5">
                                    <div class="">
                                        <div class="text-gray-600">Joined Date</div>
                                        <div>{{\Carbon\Carbon::parse($thiss->created_at)->format('d M Y')}}</div>
                                    </div>
                                    <i data-feather="clock" class="w-4 h-4 text-gray-600 ml-auto"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Chat Side Menu -->
            <!-- BEGIN: Chat Content -->
            <div class="intro-y col-span-12 lg:col-span-8 xxl:col-span-9">

                <div class="chat__box box">
                    <!-- BEGIN: Chat Active -->
                    <div style="vertical-align:middle;min-height:40vh;text-align: center" class="align-middle	bg-green-200 ">
                        <h2 style="font-weight: bolder" class="text-3xl font=bold"> Welcome to BookRoy  Select A chat to continue chat </h2>
                        <img alt="" class="-intro-x w-1/2 -mt-16" src="{{ asset('dashboard-assets/dist/images/book-tree-removebg-preview.png') }}">

                    </div>

                    <!-- END: Chat Active -->


                </div>
            </div>
            <!-- END: Chat Content -->
        </div>
    </div>
    <!-- END: Content -->


@endsection
