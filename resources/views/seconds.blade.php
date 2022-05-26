<h1>Hello</h1>
Hello, {{ $name }}.
<hr>
The current UNIX timestamp is {{ time() }}.
<hr>
展示非转义数据：
Hello, {!! $name !!}.
<hr>
@ 符号来表示 Blade 渲染引擎应当保持不变，使用JavaScript渲染内容：
Hello, @{{ name }}.

<hr>
以下内容全部交给Javascript解析：
@verbatim
    <div class="container">
        Hello, {{ name }}.
    </div>
@endverbatim
<hr>
Loop循环迭代：
@foreach ($users as $user)
    @if ($loop->first)
        This is the first iteration.
    @endif

    @if ($loop->last)
        This is the last iteration.
    @endif

    <p>This is user {{ $user->id }}</p>
@endforeach

<hr>
有条件地编译 class 样式：@@指令：

@php
    $isActive = false;
    $hasError = true;
@endphp

<span @class([
    'p-4',
    'font-bold' => $isActive,
    'text-gray-500' => ! $isActive,
    'bg-red' => $hasError,
])></span>

<span class="p-4 text-gray-500 bg-red"></span>

<hr>
Checked / Selected / Disableds属性输出：

<input type="checkbox"
        name="active"
        value="active"
        @checked(old('active', $user->active)) />

--- 
<select name="version">
    @foreach ($product->versions as $version)
        <option value="{{ $version }}" @selected(old('version') == $version)>
            {{ $version }}
        </option>
    @endforeach
</select>

--- 
<button type="submit" @disabled($errors->isNotEmpty())>Submit</button>

<hr>
