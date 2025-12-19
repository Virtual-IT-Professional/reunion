@extends('admin.include')
@section('adminTitle','Site Settings')
@section('adminContent')
<div class="row">
  <div class="col-12">
    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
      <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    @if($errors->any())
      <div class="alert alert-danger">
        <ul class="mb-0">
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
  </div>
  <div class="col-12">
    <div class="card">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Website Settings</h5>
      </div>
      <div class="card-body">
        <form action="{{ route('adminSettingsUpdate') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label">Site Name</label>
              <input type="text" name="site_name" class="form-control" value="{{ old('site_name', $settings->site_name ?? '') }}">
            </div>
            <div class="col-md-6">
              <label class="form-label">Tagline</label>
              <input type="text" name="tagline" class="form-control" value="{{ old('tagline', $settings->tagline ?? '') }}">
            </div>
            <div class="col-md-6">
              <label class="form-label">Brand Color</label>
              <input type="color" name="brand_color" class="form-control form-control-color" value="{{ old('brand_color', $settings->brand_color ?? '#19a974') }}" title="Choose brand accent color">
            </div>

            <div class="col-md-4">
              <label class="form-label">Contact Email</label>
              <input type="email" name="contact_email" class="form-control" value="{{ old('contact_email', $settings->contact_email ?? '') }}">
            </div>
            <div class="col-md-4">
              <label class="form-label">Contact Phone</label>
              <input type="text" name="contact_phone" class="form-control" value="{{ old('contact_phone', $settings->contact_phone ?? '') }}">
            </div>
            <div class="col-md-4">
              <label class="form-label">Event Date & Time</label>
              <input type="datetime-local" name="event_date" class="form-control" value="{{ old('event_date', optional($settings->event_date ?? null)->format('Y-m-d\TH:i')) }}">
            </div>

            <div class="col-md-12">
              <label class="form-label">Address</label>
              <textarea name="address" class="form-control" rows="2">{{ old('address', $settings->address ?? '') }}</textarea>
            </div>

            <div class="col-md-3">
              <label class="form-label">Facebook</label>
              <input type="url" name="facebook" class="form-control" value="{{ old('facebook', $settings->facebook ?? '') }}">
            </div>
            <div class="col-md-3">
              <label class="form-label">Twitter/X</label>
              <input type="url" name="twitter" class="form-control" value="{{ old('twitter', $settings->twitter ?? '') }}">
            </div>
            <div class="col-md-3">
              <label class="form-label">Instagram</label>
              <input type="url" name="instagram" class="form-control" value="{{ old('instagram', $settings->instagram ?? '') }}">
            </div>
            <div class="col-md-3">
              <label class="form-label">YouTube</label>
              <input type="url" name="youtube" class="form-control" value="{{ old('youtube', $settings->youtube ?? '') }}">
            </div>

            <div class="col-md-6">
              <label class="form-label">Hero Title</label>
              <input type="text" name="hero_title" class="form-control" value="{{ old('hero_title', $settings->hero_title ?? '') }}">
            </div>
            <div class="col-md-6">
              <label class="form-label">Hero Subtitle</label>
              <input type="text" name="hero_subtitle" class="form-control" value="{{ old('hero_subtitle', $settings->hero_subtitle ?? '') }}">
            </div>
            <div class="col-md-12">
              <hr>
              <h6>Homepage Media</h6>
            </div>
            <div class="col-md-6">
              <label class="form-label">Venue</label>
              <input type="text" name="venue" class="form-control" value="{{ old('venue', $settings->venue ?? '') }}" placeholder="Play Ground of CPI">
            </div>
            <div class="col-md-3">
              <label class="form-label">Participate Fee</label>
              <input type="number" name="participate_fee" class="form-control" value="{{ old('participate_fee', $settings->participate_fee ?? 1530) }}">
            </div>
            <div class="col-md-3">
              <label class="form-label">Guest Fee</label>
              <input type="number" name="guest_fee" class="form-control" value="{{ old('guest_fee', $settings->guest_fee ?? 1020) }}">
            </div>
            <div class="col-md-3">
              <label class="form-label">Bkash Number</label>
              <input type="text" name="bkash_number" class="form-control" value="{{ old('bkash_number', $settings->bkash_number ?? '01972-006267') }}">
            </div>
            <div class="col-md-3">
              <label class="form-label">Nagad Number</label>
              <input type="text" name="nagad_number" class="form-control" value="{{ old('nagad_number', $settings->nagad_number ?? '01972-006267') }}">
            </div>
            <div class="col-md-4">
              <label class="form-label">Payment Reference</label>
              <input type="text" name="payment_reference" class="form-control" value="{{ old('payment_reference', $settings->payment_reference ?? 'CPI 10-11') }}">
            </div>
            <div class="col-md-4">
              <label class="form-label">Emergency Phone(s)</label>
              <input type="text" name="emergency_phone" class="form-control" value="{{ old('emergency_phone', $settings->emergency_phone ?? '01674-779916') }}">
            </div>

            <div class="col-md-4">
              <label class="form-label">Logo (png/jpg/svg)</label>
              <input type="file" name="logo" class="form-control">
              @if(!empty($settings?->logo))
                <img src="{{ asset('public/upload/site/'.$settings->logo) }}" class="mt-2" style="max-height:60px">
              @endif
            </div>
            <div class="col-md-4">
              <label class="form-label">Favicon (png/ico)</label>
              <input type="file" name="favicon" class="form-control">
              @if(!empty($settings?->favicon))
                <img src="{{ asset('public/upload/site/'.$settings->favicon) }}" class="mt-2" style="max-height:40px">
              @endif
            </div>
            <div class="col-md-4">
              <label class="form-label">Hero Image</label>
              <input type="file" name="hero_image" class="form-control">
              @if(!empty($settings?->hero_image))
                <img src="{{ asset('public/upload/site/'.$settings->hero_image) }}" class="mt-2" style="max-height:60px">
              @endif
            </div>
            <div class="col-md-4">
              <label class="form-label">Parallax Background</label>
              <input type="file" name="parallax_image" class="form-control">
              @if(!empty($settings?->parallax_image))
                <img src="{{ asset('public/upload/site/'.$settings->parallax_image) }}" class="mt-2" style="max-height:60px">
              @endif
            </div>
            <div class="col-md-8">
              <label class="form-label">Parallax Video URL (YouTube)</label>
              <input type="url" name="parallax_video_url" class="form-control" value="{{ old('parallax_video_url', $settings->parallax_video_url ?? 'https://www.youtube.com/watch?v=R-r-M7QiOCA') }}">
            </div>

            <div class="col-12 mt-3">
              <hr>
              <h6>Homepage About Block</h6>
            </div>
            <div class="col-md-6">
              <label class="form-label">About Title</label>
              <input type="text" name="about_title" class="form-control" value="{{ old('about_title', $settings->about_title ?? 'CPI Engineer\'s Reunion 2024') }}">
            </div>
            <div class="col-md-6">
              <label class="form-label">About Subtitle</label>
              <input type="text" name="about_subtitle" class="form-control" value="{{ old('about_subtitle', $settings->about_subtitle ?? 'Session 2010-11') }}">
            </div>
            <div class="col-md-12">
              <label class="form-label">About Paragraph 1</label>
              <textarea name="about_paragraph_1" rows="3" class="form-control">{{ old('about_paragraph_1', $settings->about_paragraph_1 ?? 'Reunion 2024 is going to be held on 25th December 2024 in the joint initiative of all departments of Cumilla Polytechnic Institute for the session 2010-11. All friends of all departments of the 2010-11 session are invited to participate in the reunion.') }}</textarea>
            </div>
            <div class="col-md-12">
              <label class="form-label">About Paragraph 2</label>
              <textarea name="about_paragraph_2" rows="3" class="form-control">{{ old('about_paragraph_2', $settings->about_paragraph_2 ?? 'Register quickly to participate in the reunion and encourage your friends too.') }}</textarea>
            </div>
            <div class="col-md-12">
              <div class="form-check form-switch mt-2">
                <input class="form-check-input" type="checkbox" id="clients_enabled" name="clients_enabled" value="1" {{ old('clients_enabled', $settings->clients_enabled ?? true) ? 'checked' : '' }}>
                <label class="form-check-label" for="clients_enabled">Show Clients Slider</label>
              </div>
              <small class="text-muted">Toggle to display the clients/sponsors slider on the homepage.</small>
            </div>
            <div class="col-md-12">
              <div class="form-check form-switch mt-2">
                <input class="form-check-input" type="checkbox" id="registration_open" name="registration_open" value="1" {{ old('registration_open', $settings->registration_open ?? true) ? 'checked' : '' }}>
                <label class="form-check-label" for="registration_open">Registration Open</label>
              </div>
              <small class="text-muted">Toggle this to globally enable or disable new participant registrations.</small>
            </div>
          </div>

          <div class="text-end mt-4">
            <button class="btn btn-primary" type="submit"><i class="mdi mdi-content-save"></i> Save Settings</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
