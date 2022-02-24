@section('page-title')
    Chat
@endsection


@extends('backend.layouts.main')

@section('admin-section')
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
                        <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-feather="plus"></i> </span>
                    </button>
                    <div class="dropdown-box mt-10 absolute w-40 top-0 right-0 z-20">
                        <div class="dropdown-box__content box p-2">
                            <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="users" class="w-4 h-4 mr-2"></i> Create Group </a>
                            <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="settings" class="w-4 h-4 mr-2"></i> Settings </a>
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
                            <a data-toggle="tab" data-target="#chats" href="javascript:;" class="flex-1 py-2 rounded-md text-center active">Chats</a>
                            <a data-toggle="tab" data-target="#friends" href="javascript:;" class="flex-1 py-2 rounded-md text-center">Friends</a>
                            <a data-toggle="tab" data-target="#profile" href="javascript:;" class="flex-1 py-2 rounded-md text-center">Profile</a> </div>
                    </div>
                </div>
                <div class="tab-content">
                    <div class="tab-content__pane active" id="chats">

                        <div class="chat__chat-list overflow-y-auto scrollbar-hidden pr-1 pt-1 mt-4">

                            @foreach($users as $user)

                                <div class="intro-x cursor-pointer box relative flex items-center p-5 ">
                                    <div class="w-12 h-12 flex-none image-fit mr-1">
                                        <img alt="" class="rounded-full" src="{{asset('image/user.png')}}">
                                        <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                                    </div>

                                    <div class="ml-2 overflow-hidden">
                                        <div class="flex items-center">
                                            <a href="{{route('dashboard.chat.show',$user->id)}}" class="font-medium">{{$user->name}}</a>
                                            <div class="text-xs text-gray-500 ml-auto">01:10 PM</div>
                                        </div>
                                        <div class="w-full truncate text-gray-600">Contrary Road take me home to .hey mister motion give a potion  </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                    <div class="tab-content__pane" id="friends">
                        <div class="pr-1">
                            <div class="box p-5 mt-5">
                                <div class="relative text-gray-700">
                                    <input type="text" class="input input--lg w-full bg-gray-200 pr-10 placeholder-theme-13" placeholder="Search for messages or users...">
                                    <i class="w-4 h-4 hidden sm:absolute my-auto inset-y-0 mr-3 right-0" data-feather="search"></i>
                                </div>
                                <button type="button" class="button w-full bg-theme-1 text-white mt-3">Invite Friends</button>
                            </div>
                        </div>
                        <div class="chat__user-list overflow-y-auto scrollbar-hidden pr-1 pt-1">
                            <div class="mt-4 text-gray-600">A</div>
                            <div class="cursor-pointer box relative flex items-center p-5 mt-5">
                                <div class="w-12 h-12 flex-none image-fit mr-1">
                                    <img alt="" class="rounded-full" src="dist/images/profile-4.jpg">
                                    <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                                </div>
                                <div class="ml-2 overflow-hidden">
                                    <div class="flex items-center"> <a href="" class="font-medium">John Travolta</a> </div>
                                    <div class="w-full truncate text-gray-600">Last seen 2 hours ago</div>
                                </div>
                                <div class="dropdown relative ml-auto">
                                    <a class="dropdown-toggle w-5 h-5 block" href="javascript:;"> <i data-feather="more-horizontal" class="w-5 h-5 text-gray-700"></i> </a>
                                    <div class="dropdown-box mt-5 absolute w-40 top-0 right-0 z-20">
                                        <div class="dropdown-box__content box p-2">
                                            <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="share-2" class="w-4 h-4 mr-2"></i> Share Contact </a>
                                            <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="copy" class="w-4 h-4 mr-2"></i> Copy Contact </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="cursor-pointer box relative flex items-center p-5 mt-5">
                                <div class="w-12 h-12 flex-none image-fit mr-1">
                                    <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-13.jpg">
                                    <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                                </div>
                                <div class="ml-2 overflow-hidden">
                                    <div class="flex items-center"> <a href="" class="font-medium">Robert De Niro</a> </div>
                                    <div class="w-full truncate text-gray-600">Last seen 2 hours ago</div>
                                </div>
                                <div class="dropdown relative ml-auto">
                                    <a class="dropdown-toggle w-5 h-5 block" href="javascript:;"> <i data-feather="more-horizontal" class="w-5 h-5 text-gray-700"></i> </a>
                                    <div class="dropdown-box mt-5 absolute w-40 top-0 right-0 z-20">
                                        <div class="dropdown-box__content box p-2">
                                            <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="share-2" class="w-4 h-4 mr-2"></i> Share Contact </a>
                                            <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="copy" class="w-4 h-4 mr-2"></i> Copy Contact </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 text-gray-600">B</div>
                            <div class="cursor-pointer box relative flex items-center p-5 mt-5">
                                <div class="w-12 h-12 flex-none image-fit mr-1">
                                    <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-12.jpg">
                                    <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                                </div>
                                <div class="ml-2 overflow-hidden">
                                    <div class="flex items-center"> <a href="" class="font-medium">Leonardo DiCaprio</a> </div>
                                    <div class="w-full truncate text-gray-600">Last seen 2 hours ago</div>
                                </div>
                                <div class="dropdown relative ml-auto">
                                    <a class="dropdown-toggle w-5 h-5 block" href="javascript:;"> <i data-feather="more-horizontal" class="w-5 h-5 text-gray-700"></i> </a>
                                    <div class="dropdown-box mt-5 absolute w-40 top-0 right-0 z-20">
                                        <div class="dropdown-box__content box p-2">
                                            <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="share-2" class="w-4 h-4 mr-2"></i> Share Contact </a>
                                            <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="copy" class="w-4 h-4 mr-2"></i> Copy Contact </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="cursor-pointer box relative flex items-center p-5 mt-5">
                                <div class="w-12 h-12 flex-none image-fit mr-1">
                                    <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-4.jpg">
                                    <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                                </div>
                                <div class="ml-2 overflow-hidden">
                                    <div class="flex items-center"> <a href="" class="font-medium">Sylvester Stallone</a> </div>
                                    <div class="w-full truncate text-gray-600">Last seen 2 hours ago</div>
                                </div>
                                <div class="dropdown relative ml-auto">
                                    <a class="dropdown-toggle w-5 h-5 block" href="javascript:;"> <i data-feather="more-horizontal" class="w-5 h-5 text-gray-700"></i> </a>
                                    <div class="dropdown-box mt-5 absolute w-40 top-0 right-0 z-20">
                                        <div class="dropdown-box__content box p-2">
                                            <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="share-2" class="w-4 h-4 mr-2"></i> Share Contact </a>
                                            <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="copy" class="w-4 h-4 mr-2"></i> Copy Contact </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="cursor-pointer box relative flex items-center p-5 mt-5">
                                <div class="w-12 h-12 flex-none image-fit mr-1">
                                    <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-11.jpg">
                                    <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                                </div>
                                <div class="ml-2 overflow-hidden">
                                    <div class="flex items-center"> <a href="" class="font-medium">Angelina Jolie</a> </div>
                                    <div class="w-full truncate text-gray-600">Last seen 2 hours ago</div>
                                </div>
                                <div class="dropdown relative ml-auto">
                                    <a class="dropdown-toggle w-5 h-5 block" href="javascript:;"> <i data-feather="more-horizontal" class="w-5 h-5 text-gray-700"></i> </a>
                                    <div class="dropdown-box mt-5 absolute w-40 top-0 right-0 z-20">
                                        <div class="dropdown-box__content box p-2">
                                            <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="share-2" class="w-4 h-4 mr-2"></i> Share Contact </a>
                                            <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="copy" class="w-4 h-4 mr-2"></i> Copy Contact </a>
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
                                    <div class="font-medium text-lg">John Travolta</div>
                                    <div class="text-gray-600 mt-1">Tailwind HTML Admin Template</div>
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
                                        <div>+32 19 23 62 24 34</div>
                                    </div>
                                    <i data-feather="mic" class="w-4 h-4 text-gray-600 ml-auto"></i>
                                </div>
                                <div class="flex items-center border-b py-5">
                                    <div class="">
                                        <div class="text-gray-600">Email</div>
                                        <div>john travolta</div>
                                    </div>
                                    <i data-feather="mail" class="w-4 h-4 text-gray-600 ml-auto"></i>
                                </div>
                                <div class="flex items-center pt-5">
                                    <div class="">
                                        <div class="text-gray-600">Joined Date</div>
                                        <div>19 August 2022</div>
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
                    <div class=" h-full flex flex-col">
                        <div class="flex flex-col sm:flex-row border-b border-gray-200 px-5 py-4">
                            <div class="flex items-center">
                                <div class="w-10 h-10 sm:w-12 sm:h-12 flex-none image-fit relative">
                                    <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-4.jpg">
                                </div>
                                <div class="ml-3 mr-auto">
                                    <div class="font-medium text-base">John Travolta</div>
                                    <div class="text-gray-600 text-xs sm:text-sm">Hey, I am using chat <span class="mx-1">•</span> Online</div>
                                </div>
                            </div>
                            <div class="flex items-center sm:ml-auto mt-5 sm:mt-0 border-t sm:border-0 border-gray-200 pt-3 sm:pt-0 -mx-5 sm:mx-0 px-5 sm:px-0">
                                <a href="javascript:;" class="w-5 h-5 text-gray-500"> <i data-feather="search" class="w-5 h-5"></i> </a>
                                <a href="javascript:;" class="w-5 h-5 text-gray-500 ml-5"> <i data-feather="user-plus" class="w-5 h-5"></i> </a>
                                <div class="dropdown relative ml-auto sm:ml-3">
                                    <a href="javascript:;" class="dropdown-toggle w-5 h-5 text-gray-500"> <i data-feather="more-vertical" class="w-5 h-5"></i> </a>
                                    <div class="dropdown-box mt-6 absolute w-40 top-0 right-0 z-20">
                                        <div class="dropdown-box__content box p-2">
                                            <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="share-2" class="w-4 h-4 mr-2"></i> Share Contact </a>
                                            <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="settings" class="w-4 h-4 mr-2"></i> Settings </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="overflow-y-scroll px-5 pt-5 flex-1">
                            <div class="chat__box__text-box flex items-end float-left mb-4">
                                <div class="w-10 h-10 hidden sm:block flex-none image-fit relative mr-5">
                                    <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-4.jpg">
                                </div>
                                <div class="bg-gray-200 px-4 py-3 text-gray-700 rounded-r-md rounded-t-md">
                                    Lorem ipsum sit amen dolor, lorem ipsum sit amen dolor
                                    <div class="mt-1 text-xs text-gray-600">2 mins ago</div>
                                </div>
                                <div class="hidden sm:block dropdown relative ml-3 my-auto">
                                    <a href="javascript:;" class="dropdown-toggle w-4 h-4 text-gray-500"> <i data-feather="more-vertical" class="w-4 h-4"></i> </a>
                                    <div class="dropdown-box mt-6 absolute w-40 top-0 right-0 z-20">
                                        <div class="dropdown-box__content box p-2">
                                            <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="corner-up-left" class="w-4 h-4 mr-2"></i> Reply </a>
                                            <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="trash" class="w-4 h-4 mr-2"></i> Delete </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clear-both"></div>
                            <div class="chat__box__text-box flex items-end float-right mb-4">
                                <div class="hidden sm:block dropdown relative mr-3 my-auto">
                                    <a href="javascript:;" class="dropdown-toggle w-4 h-4 text-gray-500"> <i data-feather="more-vertical" class="w-4 h-4"></i> </a>
                                    <div class="dropdown-box mt-6 absolute w-40 top-0 right-0 z-20">
                                        <div class="dropdown-box__content box p-2">
                                            <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="corner-up-left" class="w-4 h-4 mr-2"></i> Reply </a>
                                            <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="trash" class="w-4 h-4 mr-2"></i> Delete </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-theme-1 px-4 py-3 text-white rounded-l-md rounded-t-md">
                                    Chat 1
                                    <div class="mt-1 text-xs text-theme-25">1 mins ago</div>
                                </div>
                                <div class="w-10 h-10 hidden sm:block flex-none image-fit relative ml-5">
                                    <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-13.jpg">
                                </div>
                            </div>
                            <div class="clear-both"></div>
                            <div class="chat__box__text-box flex items-end float-right mb-4">
                                <div class="hidden sm:block dropdown relative mr-3 my-auto">
                                    <a href="javascript:;" class="dropdown-toggle w-4 h-4 text-gray-500"> <i data-feather="more-vertical" class="w-4 h-4"></i> </a>
                                    <div class="dropdown-box mt-6 absolute w-40 top-0 right-0 z-20">
                                        <div class="dropdown-box__content box p-2">
                                            <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="corner-up-left" class="w-4 h-4 mr-2"></i> Reply </a>
                                            <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="trash" class="w-4 h-4 mr-2"></i> Delete </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-theme-1 px-4 py-3 text-white rounded-l-md rounded-t-md">
                                    Lorem ipsum sit amen dolor, lorem ipsum sit amen dolor
                                    <div class="mt-1 text-xs text-theme-25">59 secs ago</div>
                                </div>
                                <div class="w-10 h-10 hidden sm:block flex-none image-fit relative ml-5">
                                    <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-13.jpg">
                                </div>
                            </div>
                            <div class="clear-both"></div>
                            <div class="text-gray-500 text-xs text-center mb-10 mt-5">12 June 2020</div>
                            <div class="chat__box__text-box flex items-end float-left mb-4">
                                <div class="w-10 h-10 hidden sm:block flex-none image-fit relative mr-5">
                                    <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-4.jpg">
                                </div>
                                <div class="bg-gray-200 px-4 py-3 text-gray-700 rounded-r-md rounded-t-md">
                                    Lorem ipsum sit amen dolor, lorem ipsum sit amen dolor
                                    <div class="mt-1 text-xs text-gray-600">10 secs ago</div>
                                </div>
                                <div class="hidden sm:block dropdown relative ml-3 my-auto">
                                    <a href="javascript:;" class="dropdown-toggle w-4 h-4 text-gray-500"> <i data-feather="more-vertical" class="w-4 h-4"></i> </a>
                                    <div class="dropdown-box mt-6 absolute w-40 top-0 right-0 z-20">
                                        <div class="dropdown-box__content box p-2">
                                            <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="corner-up-left" class="w-4 h-4 mr-2"></i> Reply </a>
                                            <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="trash" class="w-4 h-4 mr-2"></i> Delete </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clear-both"></div>
                            <div class="chat__box__text-box flex items-end float-right mb-4">
                                <div class="hidden sm:block dropdown relative mr-3 my-auto">
                                    <a href="javascript:;" class="dropdown-toggle w-4 h-4 text-gray-500"> <i data-feather="more-vertical" class="w-4 h-4"></i> </a>
                                    <div class="dropdown-box mt-6 absolute w-40 top-0 right-0 z-20">
                                        <div class="dropdown-box__content box p-2">
                                            <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="corner-up-left" class="w-4 h-4 mr-2"></i> Reply </a>
                                            <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="trash" class="w-4 h-4 mr-2"></i> Delete </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-theme-1 px-4 py-3 text-white rounded-l-md rounded-t-md">
                                    Lorem ipsum
                                    <div class="mt-1 text-xs text-theme-25">1 secs ago</div>
                                </div>
                                <div class="w-10 h-10 hidden sm:block flex-none image-fit relative ml-5">
                                    <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="{{asset('image/user.png')}}">
                                </div>
                            </div>
                            <div class="clear-both"></div>
                            <div class="chat__box__text-box flex items-end float-left mb-4">
                                <div class="w-10 h-10 hidden sm:block flex-none image-fit relative mr-5">
                                    <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="{{asset('image/user.png')}}">
                                </div>
                                <div class="bg-gray-200 px-4 py-3 text-gray-700 rounded-r-md rounded-t-md">
                                    John Travolta is typing
                                    <span class="typing-dots ml-1"> <span>.</span> <span>.</span> <span>.</span> </span>
                                </div>
                            </div>
                        </div>
                        <form action="{{route('dashboard.chat.store')}}" method="post" >
                            @csrf
                            <div class="pt-4 pb-10 sm:py-4 flex items-center border-t border-gray-200">
                                <input type="hidden" name="user_id2" value="3" >
                                <textarea class="chat__box__input input w-full h-16 resize-none border-transparent px-5 py-3 focus:shadow-none" name="message" rows="1" placeholder="Type your message..."></textarea>
                                <div class="flex absolute sm:static left-0 bottom-0 ml-5 sm:ml-0 mb-5 sm:mb-0">

                                    <div class="w-4 h-4 sm:w-5 sm:h-5 relative text-gray-500 mr-3 sm:mr-5">
                                        <i data-feather="paperclip" class="w-full h-full"></i>
                                        <input type="file" class="w-full h-full top-0 left-0 absolute opacity-0">
                                    </div>
                                </div>
                                <button  type="submit" class="w-8 h-8 sm:w-10 sm:h-10 block bg-theme-1 text-white rounded-full flex-none flex items-center justify-center mr-5"> <i data-feather="send" class="w-4 h-4"></i> </button>
                            </div>
                        </form>

                    </div>
                    <!-- END: Chat Active -->


                </div>
            </div>
            <!-- END: Chat Content -->
        </div>
    </div>
    <!-- END: Content -->


@endsection
