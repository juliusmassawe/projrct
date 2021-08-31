@extends('layouts.pdf.main')

@section('title', 'Evaluations')

@section('pdf-title', 'Evaluation Results')

@section('content')
    <table >
        <thead class="table100-head">
        <tr>
            <th>#</th>
            <th>Criteria</th>
            <th>Lecturer Answers</th>
            <th>Students Answers</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>1</td>
            <td class="text-left">If class tests were done</td>
            <td><span class="green"><b>Yes</b></span></td>
            <td><span class="green"><b>Yes</b></span></td>
        </tr>

        <tr>
            <td>2</td>
            <td class="text-left">If class assignments were done</td>
            <td><span class="green"><b>Yes</b></span></td>
            <td><span class="green"><b>Yes</b></span></td>
        </tr>

        <tr>
            <td>3</td>
            <td class="text-left">If corrections were made:</td>
            <td><span class="green"><b>Yes</b></span></td>
            <td><span class="green"><b>Yes</b></span></td>
        </tr>

        <tr>
            <td>4</td>
            <td class="text-left">Frequency of tests & assignments return</td>
            <td><span class="text-warning"><b>Sometimes</b></span></td>
            <td><span class="text-warning"><b>Sometimes</b></span></td>
        </tr>

        <tr>
            <td>5</td>
            <td class="text-left">Understanding level</td>
            <td><span class="green"><b>Well understood</b></span></td>
            <td><span class="green"><b>Well understood</b></span></td>
        </tr>

        <tr>
            <td>6</td>
            <td class="text-left">Availability of Materials</td>
            <td><span class="red"><b>Not available</b></span></td>
            <td><span class="red"><b>Not available</b></span></td>
        </tr>

        <tr>
            <td>7</td>
            <td class="text-left">Course is organized in a manner that helped students in understanding the underlying concept</td>
            <td><span class="green"><b>Yes</b></span></td>
            <td><span class="green"><b>Yes</b></span></td>
        </tr>

        <tr>
            <td>8</td>
            <td class="text-left">Course is worth recommending to the coming students</td>
            <td><span class="green"><b>Yes</b></span></td>
            <td><span class="green"><b>Yes</b></span></td>
        </tr>

        <tr>
            <td>9</td>
            <td class="text-left">Course meets expectations</td>
            <td><span class="green"><b>Yes</b></span></td>
            <td><span class="green"><b>Yes</b></span></td>
        </tr>

        <tr>
            <td>10</td>
            <td class="text-left">Course is helpful in progressing towards student's study</td>
            <td><span class="green"><b>Yes</b></span></td>
            <td><span class="green"><b>Yes</b></span></td>
        </tr>

        </tbody>
    </table>

@endsection
