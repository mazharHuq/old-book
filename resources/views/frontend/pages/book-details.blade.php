
@extends('frontend.main')


@section('main-section')
    @php
        $categories=\App\Models\Category::all();
        $count=0;

    @endphp
    <!-- Single books details -->
    <div class="container ">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10 book-details p-4 shadow">
                <div class="book-top">
                    <h2>{{$book->author}}</h2>
                    <h6>Posted {{$book->created_at->diffForHumans()}}</h6>
                </div>
                <div class="book-middle row p-4">
                    <div class="col-lg-7 col-sm-12 " style="background-color:#e7edee ">
                        <img src="{{ URL('storage').'/'.$book->image }}" alt="" width="80%" height="500px" style="object-fit: contain;">

                    </div>
                    <div class="col-1">

                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <div class="b-3 p-2">
                            @if($book->user_id)
                            <span>For sale by <a class="font-bold" href="{{route('seller-books',$book->user_id)}}">{{$book->user->name}}</a> </span>
                            @else
                                <span>For sale by {{$book->admin->username}}</span>

                            @endif
                        </div>
                        <div class="b-3 p-2">
                            <i class="fas fa-phone-square fa-2x color-primary" ></i>
                            @if($book->user_id)
                            <a href="tel:{{$book->user->phone}}" style="font-size: 1.5rem;margin-bottom: 4px;color: black;">{{$book->user->phone}}</a>

                            @else
                                <a href="tel:{{$book->admin->phone}}" style="font-size: 1.5rem;margin-bottom: 4px;color: black;">{{$book->admin->phone}}</a>

                            @endif
                        </div>
                        <div class="b-3 p-2" >
                            <a href="{{route('user.chat.show',$book->user->id)}}" target="_blank">
                            <i class="fas fa-comments-dollar fa-2x color-primary" ></i> <span style="font-size: large;vertical-align: top;"><b>Chat</b></span></a>

                        </div>
                        <div class="p-4 mt-2" style=" border:1px solid rgb(42, 190, 160) ;border-radius: 10px;">
                            <div class="icon--3D09z  small--2q8vN"><svg width="24" height="24" viewBox="0 0 24 24" class="svg-wrapper--8ky9e"><g fill="none" fill-rule="evenodd"><path d="M12.073 22.42c6.473-2.857 7.551-6.072 8.27-8.215.72-2.143.825-11.073.825-11.073s-5.799-.104-9.095-2.128C8.777 3.028 2.978 3.132 2.978 3.132s.106 8.93.825 11.073c.719 2.143 1.798 5.358 8.27 8.215" fill="#60BED3"></path><path d="M12.073 1.004C8.777 3.028 2.978 3.132 2.978 3.132s.106 8.93.825 11.073c.719 2.143 1.798 5.358 8.27 8.215V1.004" fill="#4CB0C1"></path><path d="M12.073 2.282v.869c2.29 1.007 4.95 1.504 7.002 1.75-.134 4.3-.408 7.697-.697 8.559-.645 1.918-1.442 4.296-6.305 6.731v.752l.223-.098c5.487-2.423 6.413-5.183 7.026-7.01.606-1.804.696-8.875.7-9.175l.006-.54-.544-.01c-.046-.002-4.602-.103-7.123-1.65l-.288-.178" fill="#5DB8CC"></path><path d="M12.073 2.409c-.307.143-.623.277-.944.402-1.072.503-2.362.812-3.506 1.002-1.22.25-2.377.404-3.315.499.102 3.758.361 8.277.755 9.45.55 1.638 1.258 3.748 4.492 5.902.66.4 1.42.794 2.295 1.18l.223.099v-.752c-4.862-2.435-5.598-4.835-6.305-6.732-.355-.952-.953-4.802-.697-8.558 2.052-.246 4.712-.743 7.002-1.75v-.742" fill="#4AAABB"></path><path d="M12.073-.103C8.436 2.13 2.037 2.245 2.037 2.245s.117 9.853.91 12.218c.794 2.364 1.984 5.912 9.126 9.064V22.42c-6.472-2.857-7.551-6.072-8.27-8.215-.72-2.143-.825-11.073-.825-11.073s5.799-.104 9.095-2.128V-.103" fill="#F2F2F2"></path><path d="M12.073 1.004C8.777 3.028 2.978 3.132 2.978 3.132s.106 8.93.825 11.073c.719 2.143 1.798 5.358 8.27 8.215v-1.335a21.031 21.031 0 0 1-2.518-1.42c-3.48-2.1-4.216-4.295-4.731-5.83-.606-1.804-.696-8.875-.7-9.175l-.006-.54.544-.01c.025-.001 1.35-.03 2.961-.297 1.153-.238 2.365-.561 3.506-1.002.23-.109.45-.225.656-.352l.288-.177V1.004" fill="#48A7B7"></path><path d="M7.623 3.813a23.149 23.149 0 0 1-2.96.296l-.545.01.006.541c.004.3.094 7.371.7 9.175.515 1.535 1.251 3.73 4.73 5.83-3.233-2.155-3.941-4.265-4.491-5.903-.394-1.173-.653-5.692-.755-9.45a33.214 33.214 0 0 0 3.315-.5m4.45-1.53l-.288.177a6.754 6.754 0 0 1-.656.352c.321-.125.637-.259.944-.402v-.127" fill="#46A1B1"></path><path d="M7.612 11.712s2.974 2.215 3.718 3.323c0 0 3.345-5.908 5.947-7.015l-.743-1.108s-4.833 3.692-5.576 5.539l-2.23-2.216-1.116 1.477" fill="#F5F4EE"></path><path d="M10.975 12.408000000000001a.045.045 0 0 1-.002.006l.002-.006M10.985 12.387l-.002.004a.02.02 0 0 0 .002-.004m.004-.01v0m-2.262-2.142l-1.115 1.477 1.115-1.477 2.231 2.216-2.23-2.216M12.073 13.807c-.456.722-.735 1.214-.743 1.228.008-.014.288-.507.743-1.227" fill="#48A7B7"></path><path d="M8.727 10.235l-1.115 1.477s2.974 2.215 3.718 3.323c.008-.014.287-.506.743-1.228v-2.923c-.491.54-.885 1.056-1.079 1.482v.001l-.005.01v.002l-.004.008a.02.02 0 0 1-.002.004l-.003.006a.037.037 0 0 1-.002.006l-.003.005-.002.006a.023.023 0 0 1-.002.005.044.044 0 0 0-.003.007l-.001.003a.183.183 0 0 1-.004.008v.003a.092.092 0 0 0-.005.01l-2.23-2.215" fill="#E9E8E2"></path><path d="M12.073 2.409c2.552 1.194 5.691 1.694 7.765 1.903-.102 3.757-.361 8.276-.755 9.45-.67 1.998-1.576 4.696-7.01 7.323-5.434-2.627-6.34-5.325-7.01-7.323-.394-1.173-.653-5.692-.755-9.45 2.074-.209 5.213-.709 7.765-1.903m0-2.512C8.436 2.13 2.037 2.245 2.037 2.245s.117 9.853.91 12.218c.794 2.364 1.984 5.912 9.126 9.064 7.142-3.152 8.332-6.7 9.126-9.064.793-2.365.91-12.218.91-12.218S15.71 2.13 12.074-.103" fill="#BEC0C0"></path><path d="M5.063 13.762c-.394-1.173-.653-5.692-.755-9.45 2.074-.209 5.213-.709 7.765-1.903V-.103C8.22 2.087 1.981 2.234 2.037 2.245c0 0 .117 9.853.91 12.218.794 2.364 1.984 5.912 9.126 9.064v-2.442c-5.434-2.627-6.34-5.325-7.01-7.323" fill="#969696"></path></g></svg> <b>Safety Tips</b></div>
                            <ul>
                                <li>Avoid offers that look unrealistic</li>
                                <li>  Chat with seller to clarify item details</li>
                                <li>   Meet in a safe & public place</li>
                                <li> Check the item before buying it</li>
                                <li>  Don’t pay in advance</li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-12 row">
                        <h2 class="color-primary">Tk 12000</h2>
                        <h4>Features</h4>
                        <div class="col-3">
                            Written By :{{$book->author}}
                        </div>
                        <div class="col-3">

                            Used :
                        </div>
                        <div class="col-6">

                        </div>
                        <div class="col-3">
                            Total Pages:
                        </div>
                        <div class="col-3">
                            Condition:
                        </div>
                        <div class="col-6">

                        </div>
                        <div class="col-3">
                            Buying Price:৳{{$book->buy_price}}
                        </div>
                        <div class="col-12">
                            <h4>Description</h4>
                            <p>
                                {!! $book->details !!}
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <!-- Single book details -->



@endsection
