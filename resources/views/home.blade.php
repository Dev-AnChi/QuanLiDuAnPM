@extends('layouts.master')

@push('styles')


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

@endpush

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
@endpush


@section('main')

    <h1 align="center">Nhóm 22</h1>


        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-lg-6 mb-4 mb-lg-0">
                    <div class="card mb-3" style="border-radius: .5rem;">
                        <div class="row g-0">
                            <div class="col-md-4 gradient-custom text-center text-white"
                                 style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                                <img src="https://64.media.tumblr.com/040cd9befca0b3841e3fa57e5c4ade64/tumblr_pmvbqvWjVX1s5q18xo1_r1_500.png"
                                        alt="Avatar" class="img-fluid my-5" style="width: 80px;" />
                                <h5 style="color: dodgerblue">Phạm Ân Chí</h5>
                                <p style="color: dodgerblue">Admin coder</p>
                                <i class="far fa-edit mb-5"></i>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body p-4">
                                    <h6>Information</h6>
                                    <hr class="mt-0 mb-4">
                                    <div class="row pt-1">
                                        <div class="col-6 mb-3">
                                            <h6>Email</h6>
                                            <p class="text-muted">chi.pa@ntu.edu.vn</p>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <h6>Phone</h6>
                                            <p class="text-muted">0123456789</p>
                                        </div>
                                    </div>
                                    <h6>Projects</h6>
                                    <hr class="mt-0 mb-4">
                                    <div class="row pt-1">
                                        <div class="col-6 mb-3">
                                            <h6>Skill</h6>
                                            <p class="text-muted">C#</p>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <h6>Sở Tích</h6>
                                            <p class="text-muted">Ăn ngủ</p>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <a href="#!"><i class="fab fa-facebook-f fa-lg me-3"></i></a>
                                        <a href="#!"><i class="fab fa-twitter fa-lg me-3"></i></a>
                                        <a href="#!"><i class="fab fa-instagram fa-lg"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-lg-6 mb-4 mb-lg-0">
                    <div class="card mb-3" style="border-radius: .5rem;">
                        <div class="row g-0">
                            <div class="col-md-4 gradient-custom text-center text-white"
                                 style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp"
                                     alt="Avatar" class="img-fluid my-5" style="width: 80px;" />
                                <h5 style="color: dodgerblue">Nguyễn Huỳnh Hoàng Việt</h5>
                                <p style="color: dodgerblue">Admin coder</p>
                                <i class="far fa-edit mb-5"></i>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body p-4">
                                    <h6>Information</h6>
                                    <hr class="mt-0 mb-4">
                                    <div class="row pt-1">
                                        <div class="col-6 mb-3">
                                            <h6>Email</h6>
                                            <p class="text-muted">viet.nhh@ntu.edu.vn</p>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <h6>Phone</h6>
                                            <p class="text-muted">123 456 789</p>
                                        </div>
                                    </div>
                                    <h6>Projects</h6>
                                    <hr class="mt-0 mb-4">
                                    <div class="row pt-1">
                                        <div class="col-6 mb-3">
                                            <h6>Skill</h6>
                                            <p class="text-muted">Lorem ipsum</p>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <h6>Most Viewed</h6>
                                            <p class="text-muted">Dolor sit amet</p>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <a href="#!"><i class="fab fa-facebook-f fa-lg me-3"></i></a>
                                        <a href="#!"><i class="fab fa-twitter fa-lg me-3"></i></a>
                                        <a href="#!"><i class="fab fa-instagram fa-lg"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-lg-6 mb-4 mb-lg-0">
                <div class="card mb-3" style="border-radius: .5rem;">
                    <div class="row g-0">
                        <div class="col-md-4 gradient-custom text-center text-white"
                             style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                            <img src="data:image/jpeg;base64,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"
                                 alt="Avatar" class="img-fluid my-5" style="width: 80px;" />
                            <h5 style="color: dodgerblue">Nguyễn Ngọc Ý</h5>
                            <p style="color: dodgerblue">Coder</p>
                            <i class="far fa-edit mb-5"></i>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body p-4">
                                <h6>Information</h6>
                                <hr class="mt-0 mb-4">
                                <div class="row pt-1">
                                    <div class="col-6 mb-3">
                                        <h6>Email</h6>
                                        <p class="text-muted">y.nn@ntu.edu.vn</p>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <h6>Phone</h6>
                                        <p class="text-muted">123 456 789</p>
                                    </div>
                                </div>
                                <h6>Projects</h6>
                                <hr class="mt-0 mb-4">
                                <div class="row pt-1">
                                    <div class="col-6 mb-3">
                                        <h6>Recent</h6>
                                        <p class="text-muted">Lorem ipsum</p>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <h6>Most Viewed</h6>
                                        <p class="text-muted">Dolor sit amet</p>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-start">
                                    <a href="#!"><i class="fab fa-facebook-f fa-lg me-3"></i></a>
                                    <a href="#!"><i class="fab fa-twitter fa-lg me-3"></i></a>
                                    <a href="#!"><i class="fab fa-instagram fa-lg"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection

