<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
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
        //tratamento de erros josuecamelo - 13/11/2017
        if ($exception instanceof ModelNotFoundException) {
            $exception = new NotFoundHttpException($exception->getMessage(), $exception);
        }

        //Error Envolvendo Banco de Dados chaves duplicadas, truplas relacionados
        if($exception instanceof QueryException){
            return response()->view('errors.500', ['message' => $exception->getMessage()], 500);
        }

        //Erro Envolvendo Programação - Variáveis não Declaradas etc....
        if ($exception instanceof \ErrorException) {
            return response()->view('errors.500', ['file'=> $exception->getFile(), 'line'=> $exception->getLine(), 'message' => $exception->getMessage()], 500);
        }

        if ($exception instanceof TokenMismatchException){
            return redirect($request->fullUrl())->with('csrf_error',"Opps! Não foi possível verificar a Solicitação. Por favor, tente novamente");
        }

        //Geralmente Erro de Conexão
        if($exception instanceof \PDOException){
            return response()->view('errors.500', ['file'=> $exception->getFile(), 'line'=> $exception->getLine(), 'message' => $exception->getMessage()], 500);
        }
        return parent::render($request, $exception);
    }
}
