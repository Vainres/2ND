<head>  
<title>Trang Sản Phẩm</title>

<link rel="stylesheet" href="{{ URL::asset('css/reset.css');}}">
<link rel="stylesheet" href="{{ URL::asset('css/base.css');}}">
<link rel="stylesheet" href="{{ URL::asset('css/Product_page.css');}}">
<script src="{{ asset('js/product_page_slider.js') }}" defer></script>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
</style>
</head>

@extends('layouts.app')

@section('content')

        <div class="contain">
            <div class="grid">
                <div class="grid__row">
                    <div class="grid__column-1">

                    </div>
                    <div class="grid__column-6">
                        <div class="contain__produce">
                            <!-- Thẻ Chứa Slideshow -->
                            <div class="slideshow-container">
                            <!-- Kết hợp hình ảnh và nội dung cho mội phần tử trong slideshow-->

                            @php
                                $images = explode('|', $post->image);
                                $count=1;
                            @endphp
                            @foreach($images as $image)
                                <div class="mySlides fade" >
                                    <img src="{{URL::to($image)}}" width="600" height="350">
                                </div>
                            @endforeach
                        
                            <!-- Nút điều khiển mũi tên-->
                                <a class="prev" onclick="plusSlides(-1)">❮</a>
                                <a class="next" onclick="plusSlides(1)">❯</a>
                            </div>
                            <br>
                            <!-- Nút tròn điều khiển slideshow-->
                            
                            <div style="text-align:center">
                                @foreach($images as $image)
                                <span class="dot" onclick="currentSlide($count)"></span>
                                    @php
                                    $count=$count+1;
                                    @endphp
                                @endforeach
                            </div>
                        </div>
        <!-- <div class="contain">
            <div class="grid">
                <div class="grid__row">
                    <div class="grid__column-1">
                    </div>
                    <div class="grid__column-6">
                        <div class="contain__produce">
                            <span class="produce__img"> Hình ảnh </span>
                        </div> -->
                        <div class="contain__title">
                            <h2 class="contain__title-h2">{!!$post->title!!}</h2>      
                            <div class="price_save">   
                                <span class="contain__title-price">{!!$post->price!!} đ</span>
                                <!-- <button class="contain__title-follow" href="">Lưu tin 
                                    <i class="title__header-icon ti-heart">
                                </i> 
                            </button> -->
                            <save-button post-id="{{$post->id}}" saves="{{$saves}}"></save-button>
                            </div>
                            
                        </div>    
                          
                        <div class="contain__footer">
                            <div class="descript_f ">
                                <h2 class="contain__footer-h2 frame_f">Mô tả</h2>
                                <span class="contain__notify-decrip">{!! nl2br(e($post->description))!!} </span>
                            </div>
                            <div class="local_f">
                                <h2 class="contain__footer-h2 frame_f">Khu Vực</h2>
                                <i class="contain__title-area-icon   ti-location-pin"></i>
                                <span class="contain__title-area">{{$post->user->profile->address }}</span>
                            </div>  
                            <div class="share_f">
                                <h2 class="contain__footer-h2 frame_f">Chia sẻ cho bạn bè</h2>
                                <button type="button"  onclick="getURL();" ><i class="ti-link"></i></button>
                            </div>              
                        </div>
                    </div>
                    <div class="grid__column-4">
                        <div class="contain__user">
                            
                            <!-- <div class="contain__user-img" ><img class="user__img" src="{{URL::to($post->user->profile->profileImage())}}" alt=""></div> -->
                            <div class="contain__headeri">

                                <div class="contain__titleru">
                                    <!-- <div class="avt-img" style="background-image: url({{URL::to($post->user->profile->profileImage())}});"></div> -->
                                    <div class="avt-img" ><img class="user__image" src="{{URL::to($post->user->profile->profileImage())}}" alt=""></div>
                                    <h2 class="contain__title-h2">{{$post->user->name }}</h2>
                                    
                                </div>
                                <div>
                                    <!-- <i class=" contain__user-online ti-eye">  Đang hoạt động</i> -->
                                    <a class="contain__user-page" href="/profile/{{$post->user->profile->user_id}}">Xem trang </a>
                                </div>
                               
                                <span class="contain__number">
                                    SDT:{{$post->user->phone}}
                                </span>
                                <!-- <div class="contain__user-chat">
                                    <i class="contain__user-chaticon ti-comments"></i>
                                    <span class="contain__user-comment">CHAT VỚI NGƯỜI BÁN</span>
                                </div> -->
                                <div class="contain__user-calendar">
                                    <i class="contain__calendar-icon ti-calendar"></i>
                                    <span class="contain__user-dayjoin">Ngày tham gia :</span>
                                    <span class="contain__user-dayjoins">{{$post->user->created_at->toDateString()}}</span>
                                </div>
                                <div class="contain__user-add">
                                    <i class="contain__location-icon ti-location-pin"></i>
                                    <span class="contain__user-add">Địa chỉ:</span>
                                    <span class="contain__user-adds">{{$post->user->profile->address }}</span>
                                </div> 
                            </div>
                        </div>
                    </div>

                    <div class="grid__column-1">

                    </div>
                </div>
            </div>
        </div>
    <script>
        function copyToClipboard(text) {
    if (window.clipboardData) { // Internet Explorer
        window.clipboardData.setData("Text", text);
    } else {  
        unsafeWindow.netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");  
        const clipboardHelper = Components.classes["@mozilla.org/widget/clipboardhelper;1"].getService(Components.interfaces.nsIClipboardHelper);  
        clipboardHelper.copyString(text);
    }
}
     
    function getURL() {
     str=window.location.href;alert("Đã coppy "+str );
     copyToClipboard(str);
    
    
    }
    </script>
@endsection
