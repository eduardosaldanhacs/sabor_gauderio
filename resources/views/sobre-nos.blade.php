<x-layouts.site-layout :pageTitle="'Início - Pizzaria Delícia'">
    <div class="container mt-5">
        <h1 class="text-center mb-4">Sobre Nós</h1>
        <div class="row align-items-center justify-content-center">
            <div class="col-md-8 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="col-12">
                            <p class="card-text">A Sabor Gaudério é uma pizzaria que se destaca pela qualidade e sabor de
                                suas pizzas. Com uma variedade de sabores e ingredientes frescos, oferecemos uma
                                experiência
                                gastronômica única para nossos clientes. Nossa missão é proporcionar momentos especiais
                                através de nossas deliciosas pizzas.
                            </p>
                            <div class="d-flex">
                                <div class="col-6">
                                    <img src="{{ asset('assets/images/team/img1.jpg') }}" class="card-img-top"
                                        style="height: 400px" alt="Sobre Nós">
                                </div>
                                <div class="col-6 ms-1">
                                    <img src="{{ asset('assets/images/team/img2.jpg') }}" class="card-img-top"
                                        style="height: 400px" alt="Sobre Nós">
                                </div>
                            </div>
                        </div>

                        <h5 class="card-title mt-4">Quem somos</h5>
                        <p class="card-text">A Sabor Gaudério nasceu do sonho de um casal gaúcho que compartilha
                            duas grandes paixões: a gastronomia e a tradição do Sul. João, nascido nas coxilhas de São
                            Borja, sempre foi apaixonado pelos sabores rústicos da culinária campeira. Já Laura, natural
                            da serra gaúcha, cresceu entre vinhedos e receitas de família guardadas a sete chaves nas
                            cozinhas das nonas.
                        </p>
                        <img src="{{ asset('assets/images/team/img3.jpg') }}" class="card-img-top" style="height: 400px"
                            alt="Sobre Nós">
                        <img src="{{ asset('assets/images/team/img4.jpg') }}" class="card-img-top" style="height: 400px"
                            alt="Sobre Nós">

                        <p class="card-text mt-3">Esperamos vê-lo em breve!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.site-layout>
