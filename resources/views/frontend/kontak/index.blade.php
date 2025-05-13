@extends('frontend.layouts.app')

@section('title', 'Kontak - Desa Langagedha')
@section('description', 'Hubungi kami untuk informasi lebih lanjut tentang Desa Langagedha')

@push('styles')
    
@endpush

@section('content')

<section id="subheader" class="relative jarallax text-light">
    <img src="{{ asset('assets/images/background/bg1.png') }}" class="jarallax-img" alt="">
    <div class="container relative z-index-1000">
        <div class="row">
            <div class="col-lg-6">
                <ul class="crumb">
                    <li><a href="{{ route('welcome') }}">Home</a></li>
                    <li class="active">Kontak</li>
                </ul>
                <h1 class="text-uppercase">Kontak Kami</h1>
                <p class="col-lg-10 lead">Hubungi kami untuk informasi lebih lanjut tentang Desa Langagedha!</p>
            </div>
        </div>
    </div>
    <img src="{{ asset('assets/images/logo-wm.webp') }}" class="abs end-0 bottom-0 z-2 w-20" alt="">
    <div class="de-gradient-edge-top dark"></div>
    <div class="de-overlay"></div>
</section>

<section>
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-6">
                <h3 class="wow fadeInUp">Kirim Pesan Anda</h3>

                <p>Apakah Anda memiliki pertanyaan, saran, atau hanya ingin menyapa? Di sinilah tempatnya. Silakan isi formulir di bawah ini dengan detail dan pesan Anda, dan kami akan menghubungi Anda secepatnya.</p>

                <div class="spacer-single"></div>

                <div class="rounded-1 bg-light overflow-hidden">
                    <div class="row g-2">
                        <div class="col-sm-6">
                            <div class="auto-height relative" data-bgimage="url({{ asset('assets/images/contact/contact-bg.jpg') }})"></div>
                        </div>   
                        <div class="col-sm-6 relative">
                            <div class="p-30">
                                <div class="fw-bold text-dark"><i class="icofont-clock-time me-2 id-color-2"></i>Jam Operasional</div>
                                Senin - Jumat 08.00 - 16.00

                                <div class="spacer-20"></div>

                                <div class="fw-bold text-dark"><i class="icofont-location-pin me-2 id-color-2"></i>Lokasi Kantor</div>
                                Desa Langagedha, Kecamatan Bajawa<br>
                                Kabupaten Ngada, NTT

                                <div class="spacer-20"></div>

                                <div class="fw-bold text-dark"><i class="icofont-phone me-2 id-color-2"></i>Hubungi Kami</div>
                                +62 XXX XXXX XXXX

                                <div class="spacer-20"></div>

                                <div class="fw-bold text-dark"><i class="icofont-envelope me-2 id-color-2"></i>Email</div>
                                info@desalangagedha.go.id                                            
                            </div>
                        </div>                             
                    </div>
                </div>

            </div>

            <div class="col-lg-6">
                <div class="p-4 rounded-10px">
                    <form name="contactForm" id="contact_form" class="position-relative z1000" method="post">
                        @csrf
                        
                        <div class="field-set">
                            <input type="text" name="name" id="name" class="form-control" placeholder="Nama Anda" required>
                        </div>

                        <div class="field-set">
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email Anda" required>
                        </div>

                        <div class="field-set">
                            <input type="text" name="phone" id="phone" class="form-control" placeholder="Nomor Telepon" required>
                        </div>

                        <div class="field-set mb20">
                            <textarea name="message" id="message" class="form-control" placeholder="Pesan Anda" required rows="5"></textarea>
                        </div>
                            
                        <div id='submit' class="mt20">
                            <button type='submit' id='send_message' class="btn-main">
                                <span id="btn-text">Kirim Pesan</span>
                                <span id="btn-loading" style="display: none;">
                                    <i class="fa fa-spinner fa-spin"></i> Mengirim...
                                </span>
                            </button>
                        </div>

                        <div id="success_message" class='success' style="display: none;">
                            Pesan Anda berhasil dikirim. Terima kasih!
                        </div>
                        <div id="error_message" class='error' style="display: none;">
                            Maaf, terjadi kesalahan. Silakan coba lagi.
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</section>    

@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $('#contact_form').on('submit', function(e) {
        e.preventDefault();
        
        // Show loading state
        $('#btn-text').hide();
        $('#btn-loading').show();
        $('#send_message').prop('disabled', true);
        
        // Hide previous messages
        $('#success_message, #error_message').hide();
        
        // Prepare form data
        var formData = {
            name: $('#name').val(),
            email: $('#email').val(),
            phone: $('#phone').val(),
            message: $('#message').val(),
            _token: $('meta[name="csrf-token"]').attr('content')
        };
        
        // Send AJAX request
        $.ajax({
            url: '{{ route("contact.store") }}',
            type: 'POST',
            data: formData,
            success: function(response) {
                if (response.success) {
                    $('#success_message').show();
                    $('#contact_form')[0].reset();
                } else {
                    $('#error_message').show();
                }
            },
            error: function(xhr, status, error) {
                $('#error_message').show();
            },
            complete: function() {
                // Hide loading state
                $('#btn-text').show();
                $('#btn-loading').hide();
                $('#send_message').prop('disabled', false);
            }
        });
    });
});
</script>
@endpush