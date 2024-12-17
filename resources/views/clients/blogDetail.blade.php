@extends('clients.layouts.client')
@section('content')
    <style>
        .banner-contain-2 {
            background-image: url('{{ asset('assets/images/banner1.jpg') }}');
            background-size: cover;
            background-position: center;
            width: 100%;
            height: 180px;
            align-items: center;
            text-align: center;
            color: white;
        }
    </style>

    <section>
        <div class="container-fluid-lg">
            <div class="banner-contain-2 hover-effect">
                <h3 class="banner-text mt-4">TIN TỨC MỚI NHẤT</h3>
                <h1 class="banner ">Atus News</h1>
            </div>
        </div>

        <section class="blog-section section-b-space">


            <div class="container-fluid-lg">
                <p> <a href="{{ url('/blog') }}" class="mx-2"> Tin tức</a>|<a
                        class="mx-2">{{ $new->category->name }}</a>|<a class="mx-2">{{ $new->title }}</a>
                </p>
                <div class="row g-sm-4 g-3">


                    <div class="col-xxl-9 col-xl-8 col-lg-7 ratio_50 shadow-lg p-3 mb-5 bg-body-tertiary rounded">
                        <h2 class="mb-3">{{ $new->title }}</h2>
                        <div class="blog-detail-image rounded-3 mb-4">

                            <img src="{{ Storage::url($new->image) }}" class="bg-img blur-up lazyload" alt="">
                            <div class="blog-image-contain">
                                <ul class="contain-list">
                                    <li>backpack</li>
                                    <li>life style</li>
                                    <li>organic</li>
                                </ul>
                                <h2>{{ $new->title }}</h2>
                                <ul class="contain-comment-list">
                                    <li>
                                        <div class="user-list">
                                            <i data-feather="user"></i>
                                            <span>{{ $new->author }}</span>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="user-list">
                                            <i data-feather="calendar"></i>
                                            <span>{{ $new->created_at }}</span>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="user-list">
                                            <i class="ri-eye-fill align-middle"></i>
                                            <span> Đã xem: {{ $new->view_count }}</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="user-list">

                                            <i data-feather="message-square"></i>
                                            <span> Bình luận: {{ $commentCount }}</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="blog-detail-contain">
                            <p>{{ $new->content }}</p>
                        </div>
                        <div class="mt-5">
                            <h2 class="mb-3">Bài liên quan</h2>

                            <section class="related-news-carousel">
                                <div id="relatedNewsCarousel" class="carousel slide" data-bs-ride="carousel"
                                    data-bs-interval="5000">
                                    <div class="carousel-inner">
                                        @foreach ($relatedNews->chunk(4) as $index => $chunk)
                                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                                <div class="row">
                                                    @foreach ($chunk as $related)
                                                        <div class="col-md-3 mb-4">
                                                            <div class="card" style="height: 300px;">
                                                                <a
                                                                    href="{{ route('clients.blogDetail', $related->slug) }}">
                                                                    <img src="{{ Storage::url($related->image) }}"
                                                                        class="card-img-top p-2" style="height: 120px;"
                                                                        alt="{{ $related->title }}">
                                                                </a>
                                                                <div class="card-body">
                                                                    <h6 class="card-subtitle mb-2 text-secondary">
                                                                        {{ $related->category->name }}</h6>
                                                                    <h4 class="card-title">
                                                                        {{ Str::limit($related->title, 30) }}</h4>
                                                                    <p class="card-text">
                                                                        {{ Str::limit($related->content, 50) }}</p>
                                                                    <a href="{{ route('clients.blogDetail', $related->slug) }}"
                                                                        class="text-primary">Xem thêm</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>


                                </div>
                            </section>

                        </div>
                        <div class="user-list d-flex align-items-center justify-content-end mt-2">
                            <i class="ri-eye-fill align-middle me-2"></i>
                            <span>Đã xem: {{ $new->view_count }}</span>
                        </div>
                        <div class="comment-box overflow-hidden" id="comment-section">
                            <div class="leave-title">
                                <h3>Bình luận</h3>
                            </div>
                            <div class="user-comment-box">
                                <ul id="comment-list">
                                    @foreach ($new->comments as $comment)
                                        @if ($comment->approved || auth()->id() === $comment->user_id || auth()->user()->is_admin)
                                            <li id="comment-{{ $comment->id }}">
                                                <div
                                                    class="user-box border-color {{ !$comment->approved ? 'opacity-50' : '' }}">
                                                    <div class="user-image">
                                                        <img src="{{ asset('path-to-user-image/' . $comment->user->profile_image) }}"
                                                            class="img-fluid blur-up lazyload" alt="User">
                                                        <div class="user-name">
                                                            <h6>{{ $comment->created_at->format('d/m/Y H:i') }}</h6>

                                                            <h5 class="text-content">{{ $comment->user->user_name }}</h5>
                                                        </div>
                                                    </div>
                                                    <div class="user-contain">
                                                        <p id="comment-text-{{ $comment->id }}" class="mx-3">
                                                            {{ $comment->comment }}</p>
                                                        @if (!$comment->approved)
                                                            <span class="badge bg-warning text-dark  mx-3">Chờ phê
                                                                duyệt</span>
                                                        @endif

                                                    </div>
                                                    @if (auth()->check() && auth()->id() === $comment->user_id)
                                                        <div class="comment-actions ">
                                                            <button data-id="{{ $comment->id }}"
                                                                class="btn btn-sm edit-comment"
                                                                style="color: rgb(0, 123, 255)">Sửa</button>
                                                            <button data-id="{{ $comment->id }}"
                                                                class="btn btn-sm delete-comment"
                                                                style="color: rgb(255, 0, 51)">Xóa</button>
                                                        </div>
                                                    @endif
                                                </div>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                                <div id="edit-comment-modal" style="display: none; ">
                                    <div class="modal-content">
                                        <h5 class="mb-3" style="color: blue">Chỉnh sửa bình luận</h5>
                                        <span class="close"id="cancel-comment">&times;</span>

                                        <textarea id="edit-comment-text" class="form-control" rows="4"></textarea>
                                        <small class="text-danger" id="edit-comment-error" style="display: none;">Nội dung
                                            bình luận không được để trống.</small>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <button id="cancel-edit-comment" class="btn  mt-3"
                                                style="background-color: gray; color:white">Hủy</button>
                                            <button id="save-edit-comment" class="btn mt-3"
                                                style="background-color: rgb(56, 43, 233); color:white">Lưu</button>

                                        </div>
                                    </div>
                                </div>

                                <style>
                                    #edit-comment-modal {

                                        position: fixed;

                                        top: 50%;
                                        left: 50%;
                                        transform: translate(-50%, -50%);
                                        background: white;
                                        padding: 20px;
                                        border-radius: 5px;
                                        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
                                        z-index: 1000;
                                    }

                                    #edit-comment-modal .modal-content {
                                        width: 1000px;
                                        margin: auto;
                                    }
                                </style>

                            </div>
                        </div>

                        <div class="leave-box">
                            <div class="leave-title">
                                <h3>Để lại bình luận</h3>
                            </div>
                            <div class="leave-comment">
                                @if (auth()->check())
                                    @php
                                        $pendingComment = auth()
                                            ->user()
                                            ->comments()
                                            ->where('news_id', $new->id)
                                            ->where('approved', false)
                                            ->first();
                                    @endphp

                                    <form id="comment-form">
                                        @csrf
                                        <div class="col-12">
                                            <div class="blog-input mb-4">
                                                <textarea class="form-control" name="comment" rows="4" placeholder="Viết bình luận của bạn..."></textarea>
                                                <small class="text-danger" id="add-comment-error"
                                                    style="display: none;">Nội dung bình luận không được để trống.</small>
                                            </div>
                                        </div>
                                        <button type="submit"
                                            class="btn btn-animation ms-xxl-auto mt-xxl-0 mt-5 btn-md fw-bold">Đăng bình
                                            luận</button>
                                    </form>
                                @else
                                    <p>Vui lòng <a href="{{ route('login') }}">đăng nhập</a> để bình luận.</p>
                                @endif
                            </div>
                        </div>
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                const commentForm = document.getElementById('comment-form');

                                if (commentForm) {
                                    commentForm.addEventListener('submit', function(e) {
                                        e.preventDefault();

                                        const commentTextarea = commentForm.querySelector('textarea[name="comment"]');
                                        const commentText = commentTextarea.value.trim();
                                        const addCommentError = document.getElementById('add-comment-error');

                                        if (!commentText) {
                                            addCommentError.style.display = 'block';
                                            return;
                                        } else {
                                            addCommentError.style.display = 'none';
                                        }

                                        const formData = new FormData(commentForm);

                                        fetch(`{{ route('comments.storeComment', $new->id) }}`, {
                                                method: 'POST',
                                                headers: {
                                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                                        .content,
                                                },
                                                body: formData,
                                            })
                                            .then(response => response.json())
                                            .then(data => {
                                                if (data.success) {
                                                    const createdAt = new Date(data.comment.created_at);
                                                    const formattedDate =
                                                        `${("0" + createdAt.getDate()).slice(-2)}/${("0" + (createdAt.getMonth() + 1)).slice(-2)}/${createdAt.getFullYear()} ${("0" + createdAt.getHours()).slice(-2)}:${("0" + createdAt.getMinutes()).slice(-2)}`;
                                                    const commentList = document.getElementById('comment-list');
                                                    const newComment = document.createElement('li');
                                                    newComment.id = `comment-${data.comment.id}`;
                                                    newComment.innerHTML = `
                    <div class="user-box border-color ${data.comment.approved ? '' : 'opacity-50'}">
                        <div class="user-image">
                            <img src="path-to-user-image/${data.comment.user.profile_image}" class="img-fluid blur-up lazyload" alt="User">
                            <div class="user-name">
                                <h6>${formattedDate}</h6>
                                <h5 class="text-content">${data.comment.user.user_name}</h5>
                            </div>
                        </div>
                        <div class="user-contain">
                            <p class="mx-3" id="comment-text-${data.comment.id}">
                                ${data.comment.comment}
                            </p>
                            ${data.comment.approved ? '' : '<span class="badge bg-warning text-dark mx-3">Chờ phê duyệt</span>'}
                        </div>
                        <div class="comment-actions">
                            <button data-id="${data.comment.id}" class="btn btn-sm edit-comment" style="color: rgb(0, 123, 255)">Sửa</button>
                            <button data-id="${data.comment.id}" class="btn btn-sm delete-comment" style="color: rgb(255, 0, 51)">Xóa</button>
                        </div>
                    </div>
                `;

                                                    commentList.appendChild(newComment);
                                                    commentForm.reset();

                                                    alert('Bình luận của bạn đã được gửi thành công!');
                                                } else {
                                                    alert(data.message);
                                                }
                                            });
                                    });
                                }


                                let currentCommentId = null;
                                document.body.addEventListener('click', function(e) {
                                    if (e.target.classList.contains('edit-comment')) {
                                        currentCommentId = e.target.getAttribute('data-id');
                                        const commentText = document.getElementById(`comment-text-${currentCommentId}`)
                                            .textContent.trim();
                                        document.getElementById('edit-comment-text').value = commentText;
                                        document.getElementById('edit-comment-modal').style.display = 'block';
                                    }
                                });
                                document.getElementById('cancel-edit-comment').addEventListener('click', function() {
                                    currentCommentId = null;
                                    document.getElementById('edit-comment-modal').style.display = 'none';
                                });
                                document.getElementById('cancel-comment').addEventListener('click', function() {
                                    currentCommentId = null;
                                    document.getElementById('edit-comment-modal').style.display = 'none';
                                });
                                document.getElementById('save-edit-comment').addEventListener('click', function() {
                                    const updatedText = document.getElementById('edit-comment-text').value.trim();
                                    const editCommentError = document.getElementById('edit-comment-error');

                                    if (!updatedText) {
                                        editCommentError.style.display = 'block';
                                        return;
                                    } else {
                                        editCommentError.style.display = 'none';
                                    }
                                    if (updatedText && currentCommentId) {
                                        fetch(`/comments/${currentCommentId}`, {
                                                method: 'PUT',
                                                headers: {
                                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                                        .content,
                                                    'Content-Type': 'application/json',
                                                },
                                                body: JSON.stringify({
                                                    comment: updatedText
                                                }),
                                            })
                                            .then(response => response.json())
                                            .then(data => {
                                                if (data.success) {
                                                    document.getElementById(`comment-text-${currentCommentId}`)
                                                        .textContent = updatedText;
                                                    document.getElementById('edit-comment-modal').style.display = 'none';
                                                    alert('Bình luận đã được sửa thành công!');
                                                } else {
                                                    alert(data.message);
                                                }
                                            });
                                    }
                                });
                                document.body.addEventListener('click', function(e) {
                                    if (e.target.classList.contains('delete-comment')) {
                                        const commentId = e.target.getAttribute('data-id');
                                        if (confirm('Bạn có chắc muốn xóa?')) {
                                            fetch(`{{ route('comments.delete', '') }}/${commentId}`, {
                                                    method: 'DELETE',
                                                    headers: {
                                                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                                            .content,
                                                    },
                                                })
                                                .then(response => response.json())
                                                .then(data => {
                                                    if (data.success) {
                                                        const commentElement = document.getElementById(
                                                            `comment-${commentId}`);
                                                        commentElement.remove();
                                                    } else {
                                                        alert(data.message);
                                                    }
                                                });
                                        }
                                    }
                                });
                            });
                        </script>
                        <style>
                            .opacity-50 {
                                opacity: 0.5;
                            }
                        </style>
                    </div>

                    <div class="col-md-3 ">
                        <div class="shadow-lg p-3 mb-5 bg-body-tertiary rounded">
                            <h3 class="mb-3">Khuyến mãi hot</h3>
                            @foreach ($promotions as $promotion)
                                <div class="card border-0 mb-3 promotion-card">
                                    <img src="{{ Storage::url($promotion->image) }}" class="card-img-top"
                                        alt="{{ $promotion->title }}">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $promotion->title }}</h5>
                                        <p class="card-text">{{ Str::limit($promotion->content, 80) }}</p>
                                        <a href="{{ route('clients.blogDetail', $promotion->slug) }}"
                                            class="text-primary">Xem thêm</a>

                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>


                </div>
        </section>

        <script type="text/javascript">
            var Tawk_API = Tawk_API || {},
                Tawk_LoadStart = new Date();
            (function() {
                var s1 = document.createElement("script"),
                    s0 = document.getElementsByTagName("script")[0];
                s1.async = true;
                s1.src = 'https://embed.tawk.to/6752f2c24304e3196aed5b3c/1iee08htm';
                s1.charset = 'UTF-8';
                s1.setAttribute('crossorigin', '*');
                s0.parentNode.insertBefore(s1, s0);
            })();
        </script>
    @endsection
