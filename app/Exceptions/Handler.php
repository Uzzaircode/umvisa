<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Routing\Exceptions\InvalidSignatureException;
use Symfony\Component\Debug\Exception\FatalThrowableError;
use Illuminate\Session\TokenMismatchException;
use Session;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        \Illuminate\Auth\AuthenticationException::class,
        \Illuminate\Auth\Access\AuthorizationException::class,
        \Symfony\Component\HttpKernel\Exception\HttpException::class,
        \Illuminate\Database\Eloquent\ModelNotFoundException::class,
        \Illuminate\Session\TokenMismatchException::class,
        \Illuminate\Validation\ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if ($exception instanceof AuthorizationException) {
            return $this->unauthorized($request, $exception);
        }
        if ($exception instanceof AuthenticationException) {
            return $this->unauthenticated($request, $exception);
        }
        if ($exception instanceof InvalidSignatureException) {
            return $this->invalidUrlSignature($request, $exception);
        }
        if ($exception instanceof TokenMismatchException) {
            return $this->pageExpired($request, $exception);
        }
        // if($exception instanceof ErrorException){
        //     return $this->objectOnNull($request,$exception);
        // }

        // if ($exception instanceof FatalThrowableError){
        //     return $this->noRole($request, $exception);
        // }

        return parent::render($request, $exception);
    }

    public function noRole($request, Exception $exception){
            if(!Auth::user()->hasRole(['Admin','User'])){
                Auth::logout();
                return redirect('login');
            }
    }

    // public function objectOnNull($request, Exception $exception){
    //         Session::flash('fail', 'Sorry the system can\'t proceed the request');
    //         return redirect('/');
    // }

    private function unauthorized($request, Exception $exception)
    {
        // if ($request->expectsJson()) {
        //     return response()->json(['error' => $exception->getMessage()], 403);
        // }
        return $request->expectsJson()
                    ? response()->json(['message' => $exception->getMessage()], 401)
                    : redirect()->guest(route('login'));

        Session::flash('fail', 'You are not allowed to perform the action');
        return redirect()->back();
    }

    public function invalidUrlSignature($request, Exception $exception)
    {
        Session::flash('fail', 'Security token mismatched. You\'re not allowed to perform the operation');
        return redirect()->back();
    }

    public function pageExpired($request, Exception $exception){
        Session::flash('fail','Your session has expired, please login again');
        return redirect('login');
    }
}
