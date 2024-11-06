@extends('panel::layouts.app')

@section('title', __('panel/menu.sns'))

<x-panel::form.right-btns />

@section('content')
  <div class="card h-min-600">
    <div class="card-header">
      <h5 class="card-title mb-0">三方登录配置</h5>
    </div>
    <div class="card-body">
      <form class="needs-validation" novalidate id="sns-form" action="{{ panel_route('sns.index') }}" method="POST">
        @csrf

        <table>
          <tr>
            <td>1</td>
            <td>2</td>
            <td>3</td>
          </tr>
        </table>

        <button type="submit" class="d-none"></button>
      </form>
    </div>
  </div>
@endsection

@push('footer')
  <script>

  </script>
@endpush