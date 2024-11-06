@push('header')
  <script src="{{ asset('vendor/vue/3.5/vue.global.prod.js') }}"></script>
@endpush

@extends('panel::layouts.app')

@section('title', __('panel/menu.sns'))

<x-panel::form.right-btns />

@section('content')
<div id="app" class="card h-min-600">
  <div class="card-header">
    <h5 class="card-title mb-0">三方登录配置</h5>
  </div>
  <div class="card-body">
    <form class="needs-validation" novalidate id="sns-form" action="{{ panel_route('sns.index') }}" method="POST">
      @csrf

      <div class="container mt-1">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col">类型</th>
              <th scope="col">状态</th>
              <th scope="col">Client Secret</th>
              <th scope="col">回调地址</th>
              <th scope="col">排序</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">
                <div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false" id="sns-type-button">
                    @{{ snsType }}
                  </button>
                  <ul class="dropdown-menu" id="sns-type-menu">
                    <li><a class="dropdown-item" data-value="Facebook">Facebook</a></li>
                    <li><a class="dropdown-item" data-value="Twitter">Twitter</a></li>
                    <li><a class="dropdown-item" data-value="Google">Google</a></li>
                  </ul>
                </div>
                <input type="hidden" name="sns_type" id="sns_type" :value="snsType">
              </th>
              <td><input type="text" class="form-control" name="status" v-model="status"></td>
              <td><input type="text" class="form-control" name="client_secret" v-model="clientSecret"></td>
              <td><input type="text" class="form-control" name="callback_url" v-model="callbackUrl"></td>
              <td><input type="number" class="form-control" name="sort_order" v-model="sortOrder"></td>
              <td></td>
            </tr>
            <!-- 更多行... -->
          </tbody>
        </table>
      </div>
      <button type="submit" class="d-none"></button>
    </form>
  </div>
</div>
@endsection

@push('footer')
  <style>
    .btn-secondary {
    color: #000;
    background-color: #f8f9fa;
    }

    .dropdown-menu {
    background-color: #fff;
    /* 纯白色背景 */
    border-color: #fff;
    /* 白色边框 */
    }

    .dropdown-menu .dropdown-item {
    color: #000;
    background-color: #fff;
    /* 默认背景颜色为白色 */
    }

    .dropdown-menu .dropdown-item:hover,
    .dropdown-menu .dropdown-item:focus {
    background-color: #fff;
    /* 悬停或聚焦时的背景颜色也为白色 */
    }

    .dropdown-menu .dropdown-item.active,
    .dropdown-menu .dropdown-item:active {
    background-color: #fff;
    /* 选中时的背景颜色也为白色 */
    color: #000;
    /* 选中时的文字颜色为黑色 */
    }
  </style>
  <script>
    const { createApp, ref, onMounted } = Vue;

    createApp({
    setup() {
      const snsType = ref('Facebook');
      const status = ref('Mark');
      const clientSecret = ref('Otto');
      const callbackUrl = ref('@mdo');
      const sortOrder = ref(1);
      const counter = ref(0);

      const incrementCounter = () => {
      counter.value++;
      };

      const handleDropdownClick = (e) => {
      e.preventDefault();
      const selectedValue = e.target.getAttribute('data-value');
      snsType.value = selectedValue;

      // 移除所有 active 类
      document.querySelectorAll('#sns-type-menu .dropdown-item').forEach(item => {
        item.classList.remove('active');
      });

      // 给当前选中的项添加 active 类
      e.target.classList.add('active');
      };

      // 初始化事件监听器
      onMounted(() => {
      document.querySelectorAll('#sns-type-menu .dropdown-item').forEach(item => {
        item.addEventListener('click', handleDropdownClick);
      });
      });

      return {
      snsType,
      status,
      clientSecret,
      callbackUrl,
      sortOrder,
      counter,
      incrementCounter
      };
    }
    }).mount('#app');
  </script>
@endpush