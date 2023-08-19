<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electrum E-commerce</title>
    <!-- Open Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,700;0,900;1,300;1,700;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS do projeto -->
    <link rel="stylesheet" href="css/app.css">
</head>
<body>
  
    <!-- BANNERS -->
    <div class="banners">
        <div class="banner" id="banner-1">
            <div class="banner-cover"></div>
            <div class="banner-content">
                <h2>Promoão de Notebooks</h2>
                <a href="#">Ver mais <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="banner" id="banner-2">
            <div class="banner-cover"></div>
            <div class="banner-content">
                <h2>Lançamento de Acessórios</h2>
                <a href="#">Ver mais <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="banner" id="banner-3">
            <div class="banner-cover"></div>
            <div class="banner-content">
                <h2>Câmeras Potentes</h2>
                <a href="#">Ver mais <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
    <!-- PRODUCTS -->
    <div class="products-grid">
        <h2>Produtos Novos</h2>
        <div class="products-grid-container">
            <div class="products-grid-card">
                <span class="label new">New</span>
                <img src="img/prod-1.jpg" alt="Produto 1">
                <p class="category">Categoria</p>
                <h3 class="product-name">Nome do Produto</h3>
                <p class="product-price">124,90</p>
                <div class="rating-box">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <button class="btn">Comprar</button>
            </div>
            <div class="products-grid-card">
                <span class="label new">New</span>
                <img src="img/prod-2.jpg" alt="Produto 2">
                <p class="category">Categoria</p>
                <h3 class="product-name">Nome do Produto</h3>
                <p class="product-price">124,90</p>
                <div class="rating-box">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <button class="btn">Comprar</button>
            </div>
            <div class="products-grid-card">
                <span class="label new">New</span>
                <img src="img/prod-3.jpg" alt="Produto 3">
                <p class="category">Categoria</p>
                <h3 class="product-name">Nome do Produto</h3>
                <p class="product-price">124,90</p>
                <div class="rating-box">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <button class="btn">Comprar</button>
            </div>
            <div class="products-grid-card">
                <span class="label new">New</span>
                <img src="img/prod-4.jpg" alt="Produto 4">
                <p class="category">Categoria</p>
                <h3 class="product-name">Nome do Produto</h3>
                <p class="product-price">124,90</p>
                <div class="rating-box">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <button class="btn">Comprar</button>
            </div>
        </div>
    </div>
    <!-- DEAL -->
    <div class="deal-container">
        <div class="deal-container-content">
            <div class="deal-container-content-timer">
                <div class="deal-container-timer">
                    <span class="deal-container-timer-time">02</span>
                    <span class="deal-container-timer-word">dias</span>
                </div>
                <div class="deal-container-timer">
                    <span class="deal-container-timer-time">12</span>
                    <span class="deal-container-timer-word">Horas</span>
                </div>
                <div class="deal-container-timer">
                    <span class="deal-container-timer-time">42</span>
                    <span class="deal-container-timer-word">Minutos</span>
                </div>
                <div class="deal-container-timer">
                    <span class="deal-container-timer-time">22</span>
                    <span class="deal-container-timer-word">Segundos</span>
                </div>
            </div>
            <h2 class="deal-container-content-title">Promoção de Fone Gamer</h2>
            <p class="deal-container-content-subtitle">Toda a linha gamer com 50% de desconto</p>
            <button class="btn">Comprar Agora</button>
        </div>
    </div>
    <!-- MAIS VENDIDOS -->
    <div class="products-grid">
        <h2>Mais Vendidos</h2>
        <div class="products-grid-container">
            <div class="products-grid-card">
                <span class="label hot">hot</span>
                <img src="img/prod-5.jpg" alt="Produto 5">
                <p class="category">Categoria</p>
                <h3 class="product-name">Nome do Produto</h3>
                <p class="product-price">124,90</p>
                <div class="rating-box">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <button class="btn">Comprar</button>
            </div>
            <div class="products-grid-card">
                <span class="label hot">Hot</span>
                <img src="img/prod-6.jpg" alt="Produto 6">
                <p class="category">Categoria</p>
                <h3 class="product-name">Nome do Produto</h3>
                <p class="product-price">124,90</p>
                <div class="rating-box">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <button class="btn">Comprar</button>
            </div>
            <div class="products-grid-card">
                <span class="label hot">Hot</span>
                <img src="img/prod-7.jpg" alt="Produto 7">
                <p class="category">Categoria</p>
                <h3 class="product-name">Nome do Produto</h3>
                <p class="product-price">124,90</p>
                <div class="rating-box">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <button class="btn">Comprar</button>
            </div>
            <div class="products-grid-card">
                <span class="label hot">Hot</span>
                <img src="img/prod-8.jpg" alt="Produto 8">
                <p class="category">Categoria</p>
                <h3 class="product-name">Nome do Produto</h3>
                <p class="product-price">124,90</p>
                <div class="rating-box">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <button class="btn">Comprar</button>
            </div>
        </div>
    </div>

    <!-- NEWSLETTER -->
    <div class="newsletter-container">
        <h2>Assine a nossa <span>Newsletter</span></h2>
        <form action="">
            <input type="email" name="email" id="email" placeholder="Digite o seu e-mail">
            <input type="submit" class="btn btn-half" value="Assinar">
        </form>
        <div class="social-media">
            <i class="fab fa-facebook-f"></i>
            <i class="fab fa-instagram"></i>
            <i class="fab fa-twitter"></i>
            <i class="fab fa-pinterest-p"></i>
        </div>
    </div>
    <!-- FOOTER -->
    <footer class="footer">
        <div class="footer-top">
            <div class="footer-top-about">
                <h3>Sobre nós</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iure voluptatum odio harum? Delectus praesentium aperiam amet accusamus numquam quis? Ea sit ipsam magni ipsa? Dignissimos accusantium at ipsum architecto dolor!</p>
                <p><i class="fas fa-location-arrow"></i><a href="#">Rua teste, 1234</a></p>
                <p><i class="fas fa-phone"></i><a href="#">(11) 98537-3835</a></p>
                <p><i class="far fa-envelope"></i><a href="#">electrum@email.com</a></p>
            </div>
            <div class="footer-top-categories">
                <h3>Categorias</h3>
                <ul>
                    <li><a href="#">Promoções</a></li>
                    <li><a href="#">Headsets</a></li>
                    <li><a href="#">Pc Gamer</a></li>
                    <li><a href="#">Câmeras</a></li>
                    <li><a href="#">Mouse e Teclado</a></li>
                </ul>
            </div>
            <div class="footer-top-information">
                <h3>Informações</h3>
                <ul>
                    <li><a href="#">Sobre Nós</a></li>
                    <li><a href="#">Entre em Contato</a></li>
                    <li><a href="#">Política de Privacidade</a></li>
                    <li><a href="#">Pedidos de Devoluçõs</a></li>
                    <li><a href="#">Termos e Condições</a></li>
                </ul>
            </div>
            <div class="footer-top-menu">
                <h3>Menu</h3>
                <ul>
                    <li><a href="#">Minha Conta</a></li>
                    <li><a href="#">Carrinho</a></li>
                    <li><a href="#">Lista de Desejos</a></li>
                    <li><a href="#">Rastrear Pedido</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="footer-bottom-payments">
                <i class="fab fa-cc-mastercard"></i>
                <i class="fab fa-cc-visa"></i>
                <i class="fab fa-cc-diners-club"></i>
                <i class="fab fa-cc-amazon-pay"></i>
                <i class="fab fa-cc-apple-pay"></i>
            </div>
            <p>Copyright &copy; 2022 - Electrum</p>
        </div>
    </footer>
</body>
</html>