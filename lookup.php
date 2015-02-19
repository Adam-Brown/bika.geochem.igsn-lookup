<?php
    $igsn_url = $_GET['igsn_url'];
    $page = file_get_contents($igsn_url);

    $page = preg_replace('/\n/', '', $page);

    $search_targets = [
        'Sample Name',
        'Sample Type',
        "Material",
        "Classification",
        "Field Name",
        "Age (min)",
        "Age (max)",
        "Collection Method",
        "Collection Method Description",
        "Size",
        "Geological Age",
        "Geological Unit",
        "Comment",
        "Purpose",
        "Latitude",
        "Longitude",
        "Elevation",
        "Nav Type",
        "Physiographic Feature",
        "Name Of Physiographic Feature",
        "Location Description",
        "Locality",
        "Locality Description",
        "Country",
        "State/Province",
        "County",
        "City",
        "Field Program/Cruise",
        "Platform Type",
        "Platform Name",
        "Platform Description",
        "Launch Type",
        "Launch Platform Name",
        "Launch ID",
        "Collector/Chief Scientist",
        "Collector/Chief Scientist Detail",
        "Collection Start Date",
        "Collection End Date",
        "Current Archive",
        "Current Archive Contact Details",
        "Original Archive",
        "Original Archive Contact Details",
        "Depth in Hole (min)",
        "Depth in Hole (max)",
        "Parents",
        "Siblings",
        "Children"
    ];

    $data = [];

    foreach ($search_targets as $search_target)
    {
        preg_match('#' . preg_quote($search_target, '#') . ':.+?</td>.+?<td.*?>(.+?)<#', $page, $matches);
        $data[$search_target] = trim($matches[1]);
    }

	header('Content-Type: application/json');
    echo json_encode($data);
?>
