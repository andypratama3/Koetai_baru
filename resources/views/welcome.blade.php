<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/bootstrap-5.1.3-dist/css/bootstrap.min.css" />
    <link href="{{ asset('dashboard_assets/assets/css/style.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
    <title>Home</title>
</head>

<body>
    <div class="background">
        <!-- Navbar -->
        <nav class="navbar fixed-top navbar-expand-sm navbar-light bg-light py-0">
            <div class="container-fluid">
                <a href="#" class="navbar-brand fs-6 col-md-6 fs-4" style="font-weight: bold">
                    <img src="assets/img/kms-vol2.png" class="kms-vol2" alt="..." />
                    KOETAI MAHKOTA SOUNDLINE
                </a>
                <button class="navbar-toggler my-0 border-light" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link bttn bttn-pesanTiket my-1 mx-1 py-1" aria-current="page" href="#">Pesan
                                Tiket</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link bttn bttn-shop my-1 mx-1 py-1" href="">Shop</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Section 1 -->
        <div class="container">
            <div class="row">
                <div class="col col-12 col-md-6 thumb-gede">
                    <img src="assets/img/makna-logo.png" class="w-100" alt="" />
                </div>

                <div class="col">
                    <div class="row">
                        <div class="col col-md-12 thumb-sege">
                            <!-- Slides with indicators -->
                            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-indicators">
                                    @foreach ($events as $key => $event)
                                    <button type="button" data-bs-target="#carouselExampleIndicators{{ $key }}"
                                        data-bs-slide-to="{{ $key }}" class="{{ !$loop->first ?: 'active' }}"
                                        aria-current="true" aria-label="{{ $key }}"></button>
                                    @endforeach
                                </div>
                                <div class="carousel-inner">
                                    @foreach ($events as $event)
                                    <div class="carousel-item {{ !$loop->first ?: 'active' }} ">
                                        <img class="d-block w-100" src="{{ asset('storage/img/event/'. $event->foto) }}"
                                            alt="">
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-md-6 thumb-kecil d-flex justify-content-center">
                            <img src="assets/img/edisi-lebaran.png" alt="" />
                        </div>
                        <div class="col col-md-6 thumb-kecil d-flex justify-content-center">
                            <img src="assets/img/about-us.png" alt="" />
                        </div>
                    </div>
                </div>
                <!-- Sponsor -->
                <div class="container-fluid">
                    <div class="container d-flex justify-content-center">
                        <div class="teks-sponsor">
                            <h2>Sponsor</h2>
                            <div class="col-lg-2 col-md-4 col-6 d-flex">
                                @foreach ($sponsors as $sponsor)
                                <img src="{{ asset('storage/img/sponsor/'. $sponsor->logo) }}" class="img-fluid" alt="">
                                @endforeach
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="container d-flex justify-content-center">
            <p style="color: #fff; text-align: center">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Beatae optio
                alias ex, quia velit harum suscipit assumenda error, atque ut
                necessitatibus. Perspiciatis officia vel pariatur, excepturi eligendi
                mollitia enim impedit, adipisci illum veritatis in eveniet, ab
                accusantium! Quas, quasi error asperiores, earum eius, ab soluta
                laboriosam non in hic dolorum odio. Perspiciatis repellendus esse,
                officia necessitatibus deleniti autem iste porro veritatis soluta eum.
                Eos quae cupiditate optio sapiente vel, exercitationem fugit illo ex
                quibusdam totam officia molestiae earum illum natus repellat iusto!
                Nulla reprehenderit minima, debitis nobis assumenda temporibus ut sit
                laboriosam eum. Eum at voluptas, corporis enim veritatis dolor dicta
                quisquam optio reiciendis ipsa ut aut! Quaerat ullam dolore deleniti
                corporis in saepe facere accusantium iste, beatae deserunt. Itaque
                maiores nulla quisquam, voluptatem nobis hic, sit non saepe officiis
                corporis est qui in vitae corrupti, molestias illo. Ratione similique
                vitae debitis aspernatur molestiae! Provident ullam ad tenetur dicta
                libero corporis impedit aut nemo cum quos? Rerum assumenda eum
                cupiditate dolorem error est minus aliquid ipsum. Hic excepturi quae
                odio. Quam placeat doloribus quia omnis quae laudantium sapiente veniam,
                expedita numquam est nihil alias provident quisquam, libero tenetur
                minima hic quibusdam illo beatae mollitia qui ratione, eum neque
                voluptates. Omnis nam quibusdam tenetur officia ratione magni ducimus
                enim, ullam tempora recusandae dicta eveniet soluta aliquam deleniti
                doloribus laborum rerum numquam ut quas voluptas earum perspiciatis id
                eaque dolore! Ratione rerum doloremque unde dolore obcaecati? Repellat
                iste architecto aspernatur, placeat quam beatae tenetur, ipsa vel ab id
                nobis eveniet voluptas voluptates quia in suscipit? Eveniet cupiditate
                placeat at? Commodi corporis dolor veritatis officiis cum! Sequi amet
                earum molestias minus modi inventore in veniam, voluptates, aperiam
                itaque et reprehenderit vel! Saepe placeat sit nemo, voluptatum magnam
                ratione reprehenderit maiores fugiat dolorum culpa consequuntur est,
                cum, quibusdam molestias molestiae architecto possimus voluptate
                obcaecati sed provident hic. Temporibus, sed molestiae cum impedit
                tempore a omnis numquam necessitatibus, quaerat laborum sint asperiores
                voluptas consequatur reprehenderit. Veritatis, necessitatibus aperiam.
                Quos quasi cupiditate temporibus saepe mollitia, ea nisi atque incidunt,
                voluptatibus doloribus ex quo ab consequuntur modi beatae, laboriosam
                exercitationem vel sint non possimus animi. Magni cupiditate itaque,
                esse neque eligendi distinctio earum obcaecati officiis possimus, eos
                maxime! Totam adipisci, sint voluptates asperiores nobis corporis
                repellendus voluptas animi beatae provident error. Cupiditate, accusamus
                nobis consequatur dignissimos earum commodi quod maiores a corporis eum
                perspiciatis inventore nihil saepe, quam in blanditiis sapiente.
                Distinctio quisquam eum minus iusto sint, rem dolorum animi. Voluptas
                non blanditiis mollitia, nobis molestiae optio eius deserunt consectetur
                numquam saepe delectus! Praesentium, totam excepturi rerum recusandae
                incidunt ratione error illum doloremque vitae ex nisi quisquam quam unde
                impedit nam itaque et quos perferendis, aliquam sit sed animi quia. Rem
                modi culpa ipsum possimus consequuntur dolor, doloribus nesciunt quae?
                Quisquam reiciendis ex enim dignissimos neque, porro architecto. Beatae
                delectus incidunt reprehenderit! Placeat maiores sed cupiditate ut quam,
                incidunt est possimus minus labore! Ea, nemo? Enim inventore blanditiis
                quod sit atque ratione, tempora suscipit magnam consequatur ut minima
                numquam. Voluptates earum fugiat ipsam libero optio consequatur, a
                consectetur natus quisquam vel laborum quidem quo quia est quaerat quam
                veniam laudantium! Perferendis maiores quos quidem cumque veniam magnam
                reprehenderit impedit aspernatur sed optio fuga labore aliquam
                consectetur, molestias in ab, saepe perspiciatis ipsam laborum minima
                quaerat, culpa nobis? Rem atque molestias culpa debitis natus provident
                illum commodi fuga, repellendus aperiam quod magni temporibus. Inventore
                magni consequatur aspernatur debitis cum aut nulla iste dolorum at
                quisquam laboriosam reiciendis velit deleniti iure dolorem esse quis
                impedit nesciunt, mollitia neque accusantium, amet dolore? Quibusdam
                repellendus provident sint consequuntur non reiciendis porro quas culpa
                temporibus autem, repellat ratione, officiis ab, tempore omnis?
                Dignissimos possimus perferendis laudantium architecto autem, earum
                soluta. Mollitia sit libero repudiandae alias, temporibus ex, totam
                amet, officia ratione dolores officiis repellendus inventore? Possimus
                dolorem harum eveniet! Placeat blanditiis delectus dolorem tempora
                similique, facilis molestiae voluptatibus, qui minus dolores magni ad!
                Aut velit dolore sit inventore neque, placeat cum unde hic incidunt
                dignissimos eveniet sint ullam illo totam molestias numquam fugit nemo
                accusamus nihil quis natus ratione minima blanditiis asperiores? Aliquam
                a molestiae dignissimos maiores nulla possimus commodi assumenda earum
                voluptas. Asperiores impedit est odio voluptate accusantium ratione
                labore cumque voluptas corrupti aspernatur. Iusto hic recusandae
                voluptas dolorem et vero quisquam, assumenda exercitationem esse
                voluptate rerum quia nostrum provident tempora ex consectetur? Unde,
                culpa sed! Blanditiis voluptatem magni ad impedit magnam repellendus
                quas voluptates tempora, labore dicta! Consectetur ipsum quam excepturi
                dolorem in atque, eveniet nihil vitae sunt odit iusto repellendus dolor
                suscipit autem nulla culpa? Tenetur nesciunt temporibus et nihil
                accusantium quia eius repellendus ea quos cumque recusandae eum eligendi
                maiores, nobis quis necessitatibus nulla incidunt corporis deleniti
                ducimus. Nihil similique voluptatem corrupti commodi delectus maxime et
                quia sapiente adipisci provident enim aspernatur accusantium illo
                architecto consequuntur fugit corporis voluptatibus porro, facere
                laudantium numquam ab nam, qui alias! Veritatis corporis deleniti
                cumque, iste dicta maiores harum ipsam delectus corrupti omnis voluptas
                culpa illum, ratione porro aperiam. Ut, corporis praesentium cupiditate
                dolorum perferendis dicta enim optio, culpa aperiam voluptas ullam nemo
                quasi aspernatur iusto repellat ad voluptatum cum nam veniam iure
                assumenda! Delectus eveniet dolorem facilis, ad nostrum mollitia quia
                eos dolorum? Ipsum aliquid veniam, placeat voluptatum at veritatis
                possimus voluptates numquam qui quas temporibus. Repudiandae ullam, hic
                placeat natus quod vitae aspernatur eveniet voluptas, ipsam consequatur
                neque molestias ratione voluptate doloremque, soluta voluptates iste
                commodi. Hic excepturi sequi, corporis nemo obcaecati ea molestiae
                voluptate voluptatum, dolorem id nesciunt dolor doloribus! Voluptatem,
                nisi dignissimos temporibus blanditiis minus velit a? Tempora laboriosam
                nihil, totam saepe dignissimos soluta reprehenderit, aspernatur nemo sit
                reiciendis est fugit impedit! Dicta ea, sit minima nam exercitationem
                amet, laborum ad saepe nisi autem magnam. Obcaecati iusto quo
                repudiandae rerum temporibus autem quaerat voluptate alias voluptatibus
                odit error unde deserunt culpa, eligendi omnis! Nostrum obcaecati, ullam
                vero sed cum eligendi fugit eius similique velit. Modi provident ea
                aliquid consectetur reprehenderit? Explicabo quod maiores inventore
                culpa corporis itaque libero et delectus iste vero quis nihil odit
                excepturi temporibus, aliquid quos? Tempore earum explicabo blanditiis
                dolore consectetur nulla dolores error.
            </p>
        </div> --}}

            <script src="assets/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
