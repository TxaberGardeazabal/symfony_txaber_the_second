<?php

namespace App\Controller;

use App\Entity\Cursos;
use App\Entity\FotosAlmi;
use App\Repository\CursosRepository;
use App\Repository\FotosAlmiRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class WsAlmiController extends AbstractController
{
    #[Route('/ws/almi/cursos', name: 'app_ws_almi_cursos')]
    public function getAllCursos(CursosRepository $cursosRepository): JSONResponse
    {
        $cursos = $cursosRepository->findAll();

        return $this->convertToJSON($cursos);
    }

    #[Route('/ws/almi/cursos/get/{id}', name: 'app_ws_almi_get_curso', methods: 'GET')]
    public function getCursosByID(CursosRepository $cursosRepository, $id): JSONResponse
    {
        $cursos = $cursosRepository->find($id);

        return $this->convertToJSON($cursos);
    }

    #[Route('/ws/almi/cursos/add', name: 'app_ws_almi_add_curso', methods: 'POST')]
    public function addCursos(CursosRepository $cursosRepository, Request $request): JSONResponse
    {

        $data = json_decode($request->getContent(), true);

        /*if (empty($data['matricula'])) {
            throw new NotFoundHttpException('Faltan parametros');
        }*/

        $cursos=new Cursos();

        $cursos->setNombr($data['nombre']);
        $cursos->setDescripcion($data['descripcion']);
        $cursos->setImagenurl($data['imageurl']);
        $cursos->setCategoria($data['categoria']);
        $cursos->setFamilia($data['familia']);

        $cursosRepository->add($cursos, true);

        return $this->convertToJSON($cursos);
    }

    #[Route('/ws/almi/cursos/update', name: 'app_ws_almi_update_curso', methods: 'PUT')]
    public function updateCursos(CursosRepository $cursosRepository,Request $request): JSONResponse
    {
        $data = json_decode($request->getContent(), true);

        /*if (empty($data['matricula'])) {
            throw new NotFoundHttpException('Faltan parametros');
        }*/

        $cursos=new Cursos();

        $cursos->setNombr($data['nombre']);
        $cursos->setDescripcion($data['descripcion']);
        $cursos->setImagenurl($data['imageurl']);
        $cursos->setCategoria($data['categoria']);
        $cursos->setFamilia($data['familia']);

        $cursosRepository->add($cursos, true);

        return $this->convertToJSON($cursos);
    }

    #[Route('/ws/almi/cursos/delete/{id}', name: 'app_ws_almi_delete_curso', methods: 'DELETE')]
    public function deleteCursos(CursosRepository $cursosRepository, $id): JSONResponse
    {
        $cursos = $cursosRepository->find($id);
        $cursosRepository->remove($cursos, true);

        return $this->convertToJSON($cursos);
    }

    #[Route('/ws/almi/fotos', name: 'app_ws_almi_fotos')]
    public function getAllFotos(FotosAlmiRepository $fotosAlmiRepository): JSONResponse
    {
        $fotos = $fotosAlmiRepository->findAll();

        return $this->convertToJSON($fotos);
    }

    #[Route('/ws/almi/fotos/get/{id}', name: 'app_ws_almi_get_fotos', methods: 'GET')]
    public function getFotosByID(FotosAlmiRepository $fotosAlmiRepository, $id): JSONResponse
    {
        $fotos = $fotosAlmiRepository->find($id);

        return $this->convertToJSON($fotos);
    }

    #[Route('/ws/almi/fotos/add', name: 'app_ws_almi_add_fotos', methods: 'POST')]
    public function addFotos(FotosAlmiRepository $fotosAlmiRepository, Request $request): JSONResponse
    {

        $data = json_decode($request->getContent(), true);

        /*if (empty($data['matricula'])) {
            throw new NotFoundHttpException('Faltan parametros');
        }*/

        $fotos=new FotosAlmi();

        $fotos->setNombr($data['nombre']);
        $fotos->setDescripcion($data['descripcion']);
        $fotos->setImagenurl($data['imageurl']);
        $fotos->setCategoria($data['categoria']);
        $fotos->setFamilia($data['familia']);

        $fotosAlmiRepository->add($fotos, true);

        return $this->convertToJSON($fotos);
    }

    #[Route('/ws/almi/fotos/update', name: 'app_ws_almi_update_fotos', methods: 'PUT')]
    public function updateFotos(FotosAlmiRepository $fotosAlmiRepository,Request $request): JSONResponse
    {
        $data = json_decode($request->getContent(), true);

        /*if (empty($data['matricula'])) {
            throw new NotFoundHttpException('Faltan parametros');
        }*/

        $fotos=new Cursos();

        $fotos->setNombr($data['nombre']);
        $fotos->setDescripcion($data['descripcion']);
        $fotos->setImagenurl($data['imageurl']);
        $fotos->setCategoria($data['categoria']);
        $fotos->setFamilia($data['familia']);

        $fotosAlmiRepository->add($fotos, true);

        return $this->convertToJSON($fotos);
    }

    #[Route('/ws/almi/fotos/delete/{id}', name: 'app_ws_almi_delete_fotos', methods: 'DELETE')]
    public function deleteFotos(FotosAlmiRepository $fotosAlmiRepository, $id): JSONResponse
    {
        $fotos = $fotosAlmiRepository->find($id);
        $fotosAlmiRepository->remove($fotos, true);

        return $this->convertToJSON($fotos);
    }

    private function convertToJson($object):JsonResponse
    {
        $encoders=[new XmlEncoder(),new JsonEncoder()];
        $normalizers=[new DateTimeNormalizer(),new ObjectNormalizer()];
        $serializers= new Serializer($normalizers,$encoders);
        $normalized=$serializers->normalize($object,null,array(DateTimeNormalizer::FORMAT_KEY=>"Y/m/d"));
        $JsonContent=$serializers->serialize($normalized,"json");
        return JsonResponse::fromJsonString($JsonContent,200);
    }


}
