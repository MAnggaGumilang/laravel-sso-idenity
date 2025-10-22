<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Authorize Application</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style> body{font-family:system-ui,Arial,sans-serif;max-width:680px;margin:40px auto;padding:0 16px} .card{border:1px solid #ddd;border-radius:12px;padding:24px} .row{margin-top:16px;display:flex;gap:12px} button{cursor:pointer;padding:10px 16px;border-radius:8px;border:1px solid #bbb;background:#f8f8f8} button.primary{background:#0ea5e9;border-color:#0ea5e9;color:#fff}</style>
</head>
<body>
  <h1>Authorize Application</h1>

  <div class="card">
    <p><strong>{{ $client->name ?? 'OAuth Client' }}</strong> is requesting permission to access your account.</p>

    @if(!empty($scopes) && count($scopes))
      <p>This application will be able to:</p>
      <ul>
        @foreach($scopes as $scope)
          <li>{{ $scope->description ?? $scope->id }}</li>
        @endforeach
      </ul>
    @endif

    <div class="row">
      {{-- APPROVE --}}
      <form method="POST" action="{{ route('passport.authorizations.approve') }}">
        @csrf
        <input type="hidden" name="state" value="{{ $request->state ?? '' }}">
        <input type="hidden" name="client_id" value="{{ $client->getKey() }}">
        <input type="hidden" name="auth_token" value="{{ $authToken }}">
        <button type="submit" class="primary">Authorize</button>
      </form>

      {{-- DENY --}}
      <form method="POST" action="{{ route('passport.authorizations.deny') }}">
        @csrf
        @method('DELETE')
        <input type="hidden" name="state" value="{{ $request->state ?? '' }}">
        <input type="hidden" name="client_id" value="{{ $client->getKey() }}">
        <input type="hidden" name="auth_token" value="{{ $authToken }}">
        <button type="submit">Cancel</button>
      </form>
    </div>
  </div>
</body>
</html>
