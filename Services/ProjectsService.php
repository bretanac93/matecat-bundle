<?php
/**
 * Created by PhpStorm.
 * User: cesar
 * Date: 03.11.17
 * Time: 10:37
 */

namespace Lengoo\MateCatBundle\Services;

use Lengoo\MateCatBundle\Model\Project;

class ProjectsService
{
    use ServiceParams;

    /**
     * @param Project $project The Project to be created in the matecat platform.
     * @return array|[] First param of the array a bool indicating if the project was created and second param the payload.
     */
    public function newProject(Project $project)
    {
        $response = $this->client->post('/api/new', [
            'multipart' => $this->normalizeData($project)
        ]);

        $response_payload = json_decode($response->getBody()->getContents());

        return [$response_payload->status == "OK", $response_payload];
    }

    /**
     * @param $id_project
     * @param $project_pass
     * @return object The Summary of the given project
     */
    public function getProjectSummary($id_project, $project_pass)
    {
        $response_payload = $this->getProject($id_project, $project_pass);

        return $response_payload->data->summary;
    }

    /**
     * @param $id_project
     * @param $project_pass
     * @return object The Errors of the given project.
     */
    public function getProjectErrors($id_project, $project_pass)
    {
        $response_payload = $this->getProject($id_project, $project_pass);

        return $response_payload->errors;
    }

    public function getProjectTranslationUrls($id_project, $project_pass)
    {
        $response_payload = $this->getProject($id_project, $project_pass);

        $res = get_object_vars(get_object_vars($response_payload->jobs)['job-url']);

        return $res;
    }

    public function getProjectProofReadersUrls($id_project, $project_pass)
    {
        return str_replace("translate", "revise", $this->getProjectTranslationUrls($id_project, $project_pass));
    }

    public function getProjectAnalysisUrl($id_project, $project_pass)
    {
        $response_payload = $this->getProject($id_project, $project_pass);
        return $response_payload->analyze;
    }

    public function getProjectAnalysisData($id_project, $project_pass)
    {
        $response_payload = $this->getProject($id_project, $project_pass);
        $jobs = $response_payload->jobs;

        $result = [];
        foreach ($jobs as $item)
        {
            array_push($result, $item->totals);
        }
        return $result;
    }

    private function getProject($id_project, $project_pass)
    {
        $response = $this->client->get("/api/status?id_project=$id_project&project_pass=$project_pass");
        return json_decode($response->getBody()->getContents());
    }
}