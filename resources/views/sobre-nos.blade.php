<x-layouts.site-layout :pageTitle="'Sobre nós | Sabor Gaudério'" :pizzas="$pizzas">
    <main class="about-page">
        <section class="about-hero">
            <div class="about-hero-copy">
                <p class="about-kicker">Sobre nós</p>
                <h1>Uma pizzaria<br>feita por gente</h1>
                <span class="about-flourish"><i class="fa-solid fa-wheat-awn"></i></span>
                <p>Na Sabor Gaudério, cada pizza carrega mais do que ingredientes: leva histórias, cuidado e o jeito gaúcho de receber bem.</p>
                <p>Somos uma casa fictícia de forno, bancada e conversa à mesa — criada para celebrar sabores que acolhem e aproximam.</p>
            </div>
            <figure class="about-hero-image">
                <img src="{{ asset('assets/images/about/equipe-sabor-gauderio.png') }}" alt="Equipe fictícia preparando pizzas em uma cozinha com forno a lenha">
            </figure>
        </section>

        <section class="about-story section-shell">
            <div class="about-section-heading">
                <p class="about-kicker">Nossa origem fictícia</p>
                <h2>Quem somos</h2>
            </div>
            <div class="about-story-grid">
                <div>
                    <p>A Sabor Gaudério teria nascido em 2018, do encontro de três amigos que cresceram entre almoços demorados, receitas de família e o costume de sempre puxar mais uma cadeira para a mesa.</p>
                    <p>Inspirados pela cozinha do Sul e pelo prazer de reunir pessoas, imaginaram uma pizzaria em que cada sabor fosse feito com tempo, atenção e ingredientes escolhidos com carinho.</p>
                </div>
                <blockquote>“Mais do que servir pizza, nossa história inventada celebra momentos leves e verdadeiros que ficam na memória.”</blockquote>
            </div>
        </section>

        <section class="about-team section-shell">
            <div class="about-section-heading text-center">
                <p class="about-kicker">Personagens da nossa história</p>
                <h2>Nossa gente</h2>
                <p>Cada personagem tem seu papel, mas todos compartilham o mesmo propósito: fazer você se sentir em casa.</p>
            </div>
            <div class="about-team-grid">
                <article class="team-member">
                    <img src="{{ asset('assets/images/about/clara-cozinha.png') }}" alt="Retrato ilustrativo da personagem fictícia Clara">
                    <h3>Clara</h3><span>Cozinha</span>
                    <p>Cuida dos ingredientes frescos e das combinações que dão personalidade a cada receita da casa.</p>
                </article>
                <article class="team-member">
                    <img src="{{ asset('assets/images/about/miguel-forno.png') }}" alt="Retrato ilustrativo do personagem fictício Miguel">
                    <h3>Miguel</h3><span>Forno</span>
                    <p>É quem acompanha a massa, o fogo e o ponto certo que transforma boas ideias em pizzas acolhedoras.</p>
                </article>
                <article class="team-member">
                    <img src="{{ asset('assets/images/about/bento-atendimento.png') }}" alt="Retrato ilustrativo do personagem fictício Bento">
                    <h3>Bento</h3><span>Atendimento</span>
                    <p>Recebe, escuta e cuida para que a experiência seja leve, do primeiro pedido à última fatia.</p>
                </article>
            </div>
            <p class="fiction-note"><i class="fa-solid fa-circle-info"></i> História, nomes e personagens criados exclusivamente para este projeto fictício.</p>
        </section>

        <section class="about-values">
            <div class="section-shell">
                <div class="about-section-heading text-center"><h2>Receita, cuidado e boas conversas</h2></div>
                <div class="about-values-grid">
                    <article><i class="fa-solid fa-leaf"></i><h3>Ingredientes de verdade</h3><p>Escolhas simples e cuidadosas para dar sabor a cada combinação.</p></article>
                    <article><i class="fa-solid fa-fire-flame-curved"></i><h3>Feito com tempo</h3><p>Massa bem cuidada, forno quente e atenção em cada etapa.</p></article>
                    <article><i class="fa-solid fa-champagne-glasses"></i><h3>Para partilhar</h3><p>Pizzas, conversas e bons momentos ao redor da mesa.</p></article>
                </div>
            </div>
        </section>

        <section class="about-cta">
            <div><i class="fa-solid fa-pizza-slice"></i><h2>Escolha o próximo sabor da roda</h2><a class="btn-rustic" href="{{ route('cardapio') }}">Conheça nosso cardápio <i class="fa-solid fa-arrow-right"></i></a></div>
        </section>
    </main>
</x-layouts.site-layout>
