@extends('admin.include')
@section('adminTitle')
Print ID Card
@endsection
@section('adminContent')
@php
    $avatar = !empty($student->avatar) ? asset('public/upload/student/'.$student->avatar) : asset('public/admin/velzon/html/default/assets/images/users/avatar-1.jpg');
@endphp
<style>
    @font-face { font-family: 'SutonnyMJ'; src: local('SutonnyMJ'), url('{{ asset('public/fonts/SutonnyMJ.woff2') }}') format('woff2'), url('{{ asset('public/fonts/SutonnyMJ.woff') }}') format('woff'), url('{{ asset('public/fonts/SutonnyMJ.ttf') }}') format('truetype'); font-display: swap; }
    .bn-text { font-family: 'SutonnyMJ', Segoe UI, Roboto, Arial, sans-serif; }
    @media print { .no-print{ display:none!important; } body{ -webkit-print-color-adjust: exact; print-color-adjust: exact; } }
    .card-outer{ max-width: 440px; margin: 0 auto; }
    .idcard { border: 1px solid #e6e6e6; border-radius: 10px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,.06); background:#ffffff; }
    .idcard-top { position: relative; height: 130px; background: #19a974; padding: 12px 16px; }
    .idcard-top:after{ content:""; position:absolute; left:0; right:0; bottom:-40px; height:80px; background: #19a974; clip-path: polygon(0 0, 100% 0, 50% 100%); z-index:0; }
    .avatar-wrap{ position: relative; display:flex; justify-content:center; }
    .avatar{ position: relative; width: 120px; height:120px; border-radius: 999px; object-fit: cover; border: 4px solid #fff; margin-top: -50px; background:#fff; }
    .brand { position:absolute; top:12px; left:16px; display:flex; align-items:center; gap:10px; color:#fff; text-align:left; z-index:1; }
    .brand img{ height:60px; width:auto; display:block; filter: drop-shadow(0 2px 3px rgba(0,0,0,.25)); }
    .brand-text{ display:flex; flex-direction:column; line-height:1.2; }
    .brand-name{ font-weight:800; font-size:16px; }
    .brand-tagline{ font-size:12px; opacity:.9; line-height:normal; }
    .idcard-body{ padding: 10px 12px 12px; }
    .name { text-align:center; font-weight: 700; font-size: 20px; margin: 6px 0 2px; }
    .subtitle { text-align:center; color:#6b7280; font-size: 12px; margin-bottom: 8px; }
    .kv { display:grid; grid-template-columns: 80px 1fr; gap: 5px 8px; font-size: 13px; padding: 6px 8px; background: #f9fafb; border-radius:8px; }
    .kv .k{ color:#6b7280; }
    .kv .v{ font-weight:600; }
    .bottom-row{ display:flex; justify-content:space-between; align-items:center; margin-top:8px; }
    .qr{ width:78px; height:78px; background:#fff; border:1px solid #e5e7eb; border-radius:6px; display:flex; align-items:center; justify-content:center; }
    .footer-note{ text-align:right; color:#6b7280; font-size:11px; }
    /* Match footer parallax image size to QR size (78x78) */
    .footer-img{ width:90px; height:78px; padding:0.2rem; object-fit:fill; border:1px solid #e5e7eb; border-radius:6px; }
</style>
<div class="row">
    <div class="col-12 col-md-6 mx-auto">
        <div class="card-outer">
            <div class="idcard my-3">
                <div class="idcard-top">
                    <div class="brand">
                        @php
                            $brandLogo  = !empty($siteSettings?->logo) ? asset('public/upload/site/'.$siteSettings->logo) : asset('public/admin/velzon/html/default/').'/assets/images/adminLogo.png';
                            $brandName  = $siteSettings?->site_name ?? 'CPI Reunion';
                            $brandTag   = $siteSettings?->tagline ?? '';
                            $brandColor = $siteSettings?->brand_color ?? null;
                            $tagColor   = (!empty($brandColor) && strtolower($brandColor) !== '#19a974') ? $brandColor : 'rgba(255,255,255,.95)';
                        @endphp
                        <img src="{{ $brandLogo }}" alt="Logo">
                        <div class="brand-text">
                            <div class="brand-name">{{ $brandName }}</div>
                            @if(!empty($brandTag))<div class="brand-tagline bn-text" style="color: {{ $tagColor }};">{{ $brandTag }}</div>@endif
                        </div>
                    </div>
                </div>
                <div class="avatar-wrap">
                    <img src="{{ $avatar }}" class="avatar" alt="Avatar">
                </div>
                <div class="idcard-body">
                    <div class="name"><span class="bn-text">{{ $student->studentName }}</span></div>
                    <div class="subtitle fw-bold">Batch: {{ $student->batch ?? $student->department }}</div>
                    <div class="kv">
                        <div class="k">Member No</div><div class="v">{{ $student->slNo ?? $student->rollNo ?? $student->id_card_number }}</div>
                        <div class="k">Village</div><div class="v bn-text">{{ $student->currentAddress }}</div>
                        <div class="k">Phone</div><div class="v">{{ $student->phone }}</div>
                        <div class="k">Blood</div><div class="v">{{ $student->blGroup }}</div>
                        <div class="k">Member</div><div class="v">{{ $student->totalAttend ?? $student->totalMember ?? $student->total_member ?? '-' }}</div>
                        @if(!empty($student->emailAddress))
                            <div class="k">Email</div><div class="v">{{ $student->emailAddress }}</div>
                        @endif
                    </div>
                    <div class="bottom-row">
                        <div class="qr">
                            @php
                                $batchLabel = $student->batch ?? $student->department;
                                $memberNo   = $student->slNo ?? $student->rollNo ?? $student->id_card_number;
                                $mobile     = $student->phone ?? null;
                                $headerParts = array_filter([$memberNo, $batchLabel], function($v){ return !empty($v); });
                                $qrText       = 'ID: VBHS-'.implode('-', $headerParts);
                                if(!empty($mobile))     { $qrText .= "\nMobile: ".$mobile; }
                                if(!empty($batchLabel)) { $qrText .= "\nBatch: ".$batchLabel; }
                            @endphp
                            @if(class_exists('SimpleSoftwareIO\\QrCode\\Facade\\QrCode'))
                                {!! SimpleSoftwareIO\QrCode\Facade\QrCode::size(78)->format('svg')->margin(0)->generate($qrText) !!}
                            @else
                                @php $qrData = urlencode($qrText); @endphp
                                <img src="https://api.qrserver.com/v1/create-qr-code/?size=78x78&data={{ $qrData }}" alt="QR">
                            @endif
                        </div>
                        @php $parallaxImg = !empty($siteSettings?->parallax_image) ? asset('public/upload/site/'.$siteSettings->parallax_image) : null; @endphp
                        @if($parallaxImg)
                            <img src="{{ $parallaxImg }}" alt="Parallax" class="footer-img">
                        @else
                            <div class="footer-note">{{ $brandName }}</div>
                        @endif
                    </div>
                    @php $emergency = $siteSettings?->contact_phone ?? null; @endphp
                    @if(!empty($emergency))
                        <div class="footer-note mt-2"><span class="fw-bold">Emergency:</span> {{ $emergency }}</div>
                    @endif
                    <div class="mt-3 no-print text-center">
                        <button onclick="window.print()" class="btn btn-primary"><i class="fa-solid fa-print"></i> Print</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
