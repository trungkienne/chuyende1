
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web bán cafe</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <style>
        #blog {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #444;
        }
        .blog-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }
        .post-card {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            text-align: center;
            transition: transform 0.3s ease;
            cursor: pointer;
        }
        .post-card:hover {
            transform: translateY(-10px);
        }
        .post-card img {
            max-width: 100%;
            height: auto;
            border-bottom: 1px solid #ddd;
        }
        .post-card-content {
            padding: 15px;
        }
        .post-card h2 {
            color: #333;
            font-size: 1.2rem;
            margin: 10px 0;
        }
        .post-card small {
            display: block;
            margin-bottom: 10px;
            color: #777;
            font-size: 0.9rem;
        }
        .post-card p {
            font-size: 0.95rem;
            color: #555;
            margin-bottom: 15px;
        }

    </style>
</head>
<body>
    <!-- Phần header -->
    <section id="header">
            <a href="/"><img src="{{ asset('img/logo.png') }}">
            <div>
                <ul id="navbar">
                    <li><a class="active" href="/">Trang chủ</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle">Danh mục</a>
                            <ul class="dropdown-menu">
                        
                                @foreach($categories as $category)
                                    <li><a href="/category/{{ $category->id }}">{{ htmlspecialchars($category->name) }}</a></li>
                                @endforeach
                            </ul>
                    </li>
                    <!-- 🔎 Thanh tìm kiếm trên header -->
                    <li>
                        <form action="search.php" method="GET" class="search-form">
                            <input type="text" name="keyword" placeholder="Tìm sản phẩm..." required>
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </li>
                    <!-- Kiểm tra trạng thái đăng nhập -->
                    @if($isLoggedIn)
                        <li>
                            <a href="a-user/index.php" style="text-decoration:none;">
                                <h4>Hi, {{ $fullname }} 👤</h4>
                            </a>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                                @csrf
                                <button type="submit" style="background:none; border:none; color:inherit; cursor:pointer; text-decoration:none;">Đăng xuất</button>
                            </form>
                        </li>
                    @else
                        <li>
                            <a href="/login">Đăng nhập</a>
                        </li>
                    @endif
                    <li>
                        <a href="/cart"
                            ><i class="fa-solid fa-cart-shopping"></i
                        ></a>
                    </li>
                </ul>
            </div>
        </section>
    <section id="hero">
        <h2 style="color: white;">Cà phê rang xay thủ công</h2>
        <h2 style="color: white;">Hương vị đậm đà mỗi ngày</h2>
        <p style="color: white;">Giao tận nơi hoặc nhận tại cửa hàng. Hạt cà phê tuyển chọn, rang theo đơn hàng để<br> giữ độ tươi và hương nguyên bản.</p>
        <a href="/shop">
            <button>Shop Now</button>
        </a>
    </section>

    <section id="feature" class="section-p1">
            <div class="fe-box">
                <img src="{{ asset('img/features/f1.png') }}" alt="" />
                <h6>Miễn phí giao hàng</h6>
            </div>
            <div class="fe-box">
                <img src="{{ asset('img/features/f2.png') }}" alt="" />
                <h6>Thanh toán Onl</h6>
            </div>
            <div class="fe-box">
                <img src="{{ asset('img/features/f3.png') }}" alt="" />
                <h6>Tiết kiệm</h6>
            </div>
            <div class="fe-box">
                <img src="{{ asset('img/features/f4.png') }}" alt="" />
                <h6>khuyến mãi</h6>
            </div>
            <div class="fe-box">
                <img src="{{ asset('img/features/f5.png') }}" alt="" />
                <h6>Nhanh chóng</h6>
            </div>
            <div class="fe-box">
                <img src="{{ asset('img/features/f6.png') }}" alt="" />
                <h6>Hỗ trợ 24/7</h6>
            </div>
    </section>
    <!-- Phần sản phẩm -->
    <section id="product1" class="section-p1">
        <h2>Top Các Sản Phẩm Bán Chạy</h2>
        <div class="pro-container">
    @foreach($products as $p)
        <div class="pro">
            <a href="/product/{{ $p->id }}">
                <img src="{{ asset('uploads/'.$p->image) }}">
            </a>

            <div class="des">
                <h5>{{ $p->name }}</h5>

                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>

                <h4>{{ number_format($p->price, 0, ',', '.') }}đ</h4>
            </div>
        </div>
    @endforeach
</div>
    </section>

    

    <section id="banner" class="section-m1">
            <h4>Kho Voucher</h4>
            <h2><span>Giảm giá lên đến 12%</span> tất cả các sản phẩm</h2>
            <a href="shop.php">
                <button class="normal">Tìm hiểu thêm</button>
            </a>
    </section>
    <!--About-->
    <section class="about-store section-p1">
    <div class="about-store-content">

          <div class="special-content">
            <!-- Bên trái: Hình ảnh -->
            <div class="special-image">
            <img src="img/coffee-special.jpg" alt="Cà phê đặc biệt">
            </div>

            <!-- Bên phải: Nội dung -->
            <div class="special-text">
            <h3>Cà phê rang xay</h3>
            <h2>ĐẬM ĐÀ NGUYÊN BẢN</h2>
            <p class="subtitle">— Vị mộc từ hạt, cho khách miền xuôi —</p>
            <p class="desc">
                Được tuyển chọn kỹ lưỡng từ những hạt cà phê Arabica và Robusta
                chất lượng cao, rang thủ công để giữ trọn hương vị nguyên bản.
                Từng tách cà phê mang đến sự cân bằng giữa vị đắng, chua thanh
                và hương thơm tự nhiên, để bạn tận hưởng trọn vẹn tinh hoa đất trời.
            </p>
            <a href="/category/1">
                <button class="btn-order">Thử ngay</button>
            </a>

            </div>

        </div>
        <br>

        <!-- Khối Không gian quán -->
        <div class="store-space">
        <div class="space-text">
            <h3>SIGNATURE</h3>
            <h2>By Our Coffee Shop</h2>
            <p>
            Nơi cuộc hẹn tròn đầy với cà phê đặc sản, món ăn đa bản sắc
            và không gian cảm hứng để bạn tận hưởng trọn vẹn từng khoảnh khắc.
            </p>
            <a href="/about">
                <button class="btn-learn-more">Tìm hiểu thêm</button>
            </a>

        </div>

        <div class="space-slider">
            <div class="slides">
            <img src="{{ asset('img/space1.png') }}" alt="Không gian 1">
            <img src="{{ asset('img/space2.png') }}" alt="Không gian 2">
            <img src="{{ asset('img/space3.png') }}" alt="Không gian 3">
            </div>
            <button class="prev">&#10094;</button>
            <button class="next">&#10095;</button>
        </div>
        </div>

    </div>

    <!-- Phần sản phẩm -->
    <header>
        <div class="task-bar">
            <h1>Trang Blog</h1>
        </div>
    </header>
    <section id="blog">
        <div class="blog-grid">
    @if($blogs && count($blogs) > 0)
        @foreach($blogs as $post)
        <div class="post-card"
             onclick="location.href='/blog/{{ $post->id }}'">

            <img src="{{ asset('uploads/'.$post->image) }}">

            <div class="post-card-content">
                <h2>{{ $post->title }}</h2>

                <small>
                    {{ $post->author }}
                    - {{ $post->created_at }}
                </small>

                <p>
                    {{ \Illuminate\Support\Str::limit($post->content, 100) }}
                </p>
            </div>
        </div>
    @endforeach
</div>
            @else
                <p>Chưa có bài viết nào!</p>
            @endif
        </div>
    </section>

    

    <section id="news-letter" class="section-p1 section-m1">
            <div class="newstext">
                <h4>Bản tin</h4>
                <p>Nhập Email của bạn để cập nhật những thông tin mới nhất</p>
            </div>
            <div class="form">
                <input type="text" placeholder="Địa chỉ Email:" />
                <a href="/contact">
                    <button class="normal normal-btn">Đăng kí</button>
                </a>
            </div>
    </section>

    <footer class="section-p1">
            <div class="col">
                <img class="logo" src="{{ asset('img/logo.png') }}" alt="">
                <h4>Liên Hệ</h4>
                <p><strong>Số 10 Đường Phú Mỹ Mỹ Đình Nam Từ Liêm Hà Nội</strong></p>
                <p><strong>Phone : 0346365181</strong></p>
                <p><strong>Việt Nam</strong></p>
                <div class="follow">
                    <h4>Follow us</h4>
                    <div class="icon">
                        <i class="fab fa-facebook-f"></i>
                        <i class="fab fa-twitter"></i>
                        <i class="fab fa-instagram"></i>
                        <i class="fab fa-pinterest-p"></i>
                        <i class="fab fa-youtube"></i>
                    </div>
                </div>
            </div>
            <div class="col-ab">
                <h4>About</h4>
                <a href="/about">Về chúng tôi</a>
                <a href="#">Thông tin giao hàng</a>
                <a href="#">Chính sách bảo mật</a>
                <a href="#">Điều khoản điều kiện</a>
                <a href="/contact">Liên hệ chúng tôi</a>
            </div>
            <div class="col-acc">
                <h4>Tài Khoản của tôi</h4>
                <a href="/profile">Profile của tôi</a>
                <a href="/cart">Xem giỏ hàng</a>
                <a href="#">Danh sách mong muốn</a>
                <a href="/orders">Theo dõi đơn hàng</a>
                <a href="/contact">Trợ giúp</a>
            </div>
            <div class="col install">
                <h4>Tải ứng dụng</h4>
                <p>Từ AppStore hoặc Google</p>
                <div class="row">
                    <img src="{{ asset('img/pay/app.jpg') }}" alt="" />
                    <img src="{{ asset('img/pay/play.jpg') }}" alt="" />
                </div>
                <p>Cổng thanh toán</p>
                <img src="{{ asset('img/pay/pay.png') }}" alt="" />
            </div>

            <div class="coppyright">
                <p>© 2026, DTK - HTML CSS Template</p>
            </div>

    </footer>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const toggle = document.querySelector(".dropdown-toggle");
        const menu = document.querySelector(".dropdown-menu");

        // Bật/tắt khi click
        toggle.addEventListener("click", function(e) {
            e.preventDefault();
            menu.style.display = (menu.style.display === "block") ? "none" : "block";
        });

        // Ẩn khi click ra ngoài
        document.addEventListener("click", function(e) {
            if (!toggle.contains(e.target) && !menu.contains(e.target)) {
                menu.style.display = "none";
            }
        });
        const slides = document.querySelector(".slides");
        const images = document.querySelectorAll(".slides img");
        const prev = document.querySelector(".prev");
        const next = document.querySelector(".next");

        let index = 0;

        function showSlide(i) {
            if (i >= images.length) index = 0;
            if (i < 0) index = images.length - 1;
            slides.style.transform = `translateX(${-index * 100}%)`;
        }

        next.addEventListener("click", () => {
            index++;
            showSlide(index);
        });

        prev.addEventListener("click", () => {
            index--;
            showSlide(index);
        });
    });

    </script>
</body>
</html>

