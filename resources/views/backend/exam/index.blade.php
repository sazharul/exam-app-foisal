@extends('backend.layouts.master')
@section('title', 'All ' . request()->ref . ' ' . request()->type . 'exam list')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page_title_box d-flex align-items-center justify-content-between">
                <div class="page_title_left">
                    <h3 class="f_s_30 f_w_700 text_white">List of
                        {{ request()->child ?? request()->ref }}{{ ' ' . request()->type }}</h3>
                    <ol class="breadcrumb page_bradcam mb-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">{{ $company->name }} </a></li>
                        <li class="breadcrumb-item"><a
                                href="javascript:void(0);">{{ request()->ref . ' ' . request()->type }}</a></li>
                        @if (request()->child)
                            <li class="breadcrumb-item"><a
                                    href="javascript:void(0);">{{ request()->child . ' ' . request()->type }}
                                    exam</a></li>
                        @endif
                        <li class="breadcrumb-item active">Index</li>
                    </ol>
                </div>
                <a href="{{ route('exam.create', ['ref' => request()->ref, 'type' => 'Preliminary', 'child' => request()->child]) }}"
                    class="white_btn3">Create
                    Preliminary Exam</a>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="white_card card_height_100 mb_30">
                <div class="white_card_body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Action</th>
                                    <th scope="col">Exam Name</th>
                                    <th scope="col">Subjects Name</th>
                                    <th scope="col">Topic & Source Name</th>
                                    <th scope="col">Marking System</th>
                                    <th scope="col">Exam Timeline</th>
                                    <th scope="col">Duration(Minutes)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($exam as $item)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td class="d-flex justify-content-around">
                                            <a href="{{ route('exam.mcqQuestion', [$item->id, 'ref' => 'BCS', 'type' => 'Preliminary']) }}"
                                                class="btn btn-info me-2">
                                                <i class="fas fa-file-signature"></i>
                                            </a>
                                            <a href="{{ route('exam.create', [$item->id, 'ref' => 'BCS', 'type' => 'Preliminary']) }}"
                                                class="btn btn-info me-2">
                                                <i class="far fa-edit"></i>
                                            </a>

                                            {{-- <form action="{{ route('page.delete',$page) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form> --}}
                                        </td>
                                        <td>{{ $item->published_at->format('d F Y') }}</td>
                                        <td>
                                            @foreach ($item->subjects as $subject)
                                                {{ $subject->name }}
                                                @if (!$loop->last)
                                                    {{ ',' }}<br>
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach ($item->topics as $topics)
                                                {{ $topics->topic }} -
                                                {{ $topics->source }}
                                                @if (!$loop->last)
                                                    {{ ',' }}<br>
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            Positive Makr: {{ $item->per_question_positive_mark }}, <br>
                                            Negative Mark: {{ $item->per_question_negative_mark }}
                                        </td>
                                        <td>
                                            Published Date: {{ $item->published_at->format('Y-m-d H:i:s A') }}, <br>
                                            Expired Date: {{ $item->expired_at->format('Y-m-d H:i:s A') }}
                                        </td>
                                        <td>{{ $item->duration / 60 }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
