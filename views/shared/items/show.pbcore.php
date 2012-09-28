<?php echo '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>'; ?>
<pbcoreDescriptionDocument xmlns="http://www.PBCore.org/PBCore/PBCoreNamespace.html"
              xmlns:mt="http://www.iana.org/assignments/media-types/"
              xmlns:la="http://www.loc.gov/standards/iso639-2/"
              xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
		
	<?php $item = get_current_item(); ?>

	<pbcoreAssetDate dateType="Broadcast"><?php echo item('PBCore', 'Date Broadcast'); ?></pbcoreAssetDate>
		<pbcoreAssetDate dateType="Created"><?php echo item('PBCore', 'Date Created'); ?></pbcoreAssetDate>
	<pbcoreIdentifier source="Omeka"><?php echo item('PBCore', 'Identifier'); ?></pbcoreIdentifier>

	<?php foreach (item('PBCore', 'Title', array('all'=>true)) as $title) { ?>
	<pbcoreTitle><?php echo $title; ?></pbcoreTitle>
	<?php } ?>

	<pbcoreTitle titleType="Episode"><?php echo item('PBCore', 'Episode Title'); ?></pbcoreTitle>
	<pbcoreTitle titleType="Series"><?php echo item('PBCore', 'Series Title'); ?></pbcoreTitle>
	
	<pbcoreSubject source="Free tags">
	<?php // Return if the item has no tags.
        if (!count($item->Tags)) {
            return null;
        }
        foreach ($item->Tags as $tag) {
            // tag
            echo $tag; }?></pbcoreSubject>
	
	<pbcoreDescription><?php echo item('PBCore', 'Description'); ?></pbcoreDescription>
	<pbcoreCoverage>
		<coverage><?php if (function_exists('geolocation_get_location_for_item') && geolocation_get_location_for_item($item, true)) { $location = geolocation_get_location_for_item($item, true); echo $location->address; } ?></coverage>
		<coverageType>Spatial</coverageType>
	</pbcoreCoverage>
	<pbcoreCreator>
		<creator><?php echo item('PBCore', 'Creator'); ?></creator>
		<creatorRole>Creator</creatorRole>
	</pbcoreCreator>   

	<pbcoreContributor>
		<contributor><?php echo item('PBCore', 'Interviewee'); ?></contributor>
		<contributorRole><?php echo "Interviewee"; ?></contributorRole>
	</pbcoreContributor>
	<pbcoreContributor>	
		<contributor><?php echo item('PBCore', 'Interviewer'); ?></contributor>
		<contributorRole><?php echo "Interviewer"; ?></contributorRole>
	</pbcoreContributor>
	<pbcoreContributor>
		<contributor><?php echo item('PBCore', 'Host'); ?></contributor>
		<contributorRole><?php echo "Host"; ?></contributorRole>
	</pbcoreContributor>

	<pbcoreRightsSummary>
	    <rightsSummary><?php echo item('PBCore', 'Rights'); ?></rightsSummary>
	</pbcoreRightsSummary>

	<pbcoreInstantiation>
		<instantiationIdentifier source="Internet Archive"></instantiationIdentifier>
		<instantiationDigital><?php echo item('PBCore', 'Digital Format'); ?></instantiationDigital>
		<instantiationLocation><?php echo item('PBCore', 'Digital Location'); ?></instantiationLocation>
		<instantiationDuration><?php echo item('PBCore', 'Duration'); ?></instantiationDuration>
	</pbcoreInstantiation>
	
	<pbcoreInstantiation>
	<?php foreach (item('PBCore', 'Title', array('all'=>true)) as $title) { ?>
	<instantiationIdentifier><?php echo $title; ?></instantiationIdentifier>
	<?php } ?>		
	<instantiationPhysical><?php echo item('PBCore', 'Physical Format'); ?></instantiationPhysical>
		<instantiationLocation><?php echo item('PBCore', 'Physical Location'); ?></instantiationLocation>
	</pbcoreInstantiation>

	<pbcoreAnnotation annotationType="Transcription"><?php echo item('PBCore', 'Transcription'); ?></pbcoreAnnotation>
	<pbcoreAnnotation annotationType="Notes"><?php echo item('PBCore', 'Notes'); ?></pbcoreAnnotation>
	<pbcoreAnnotation annotationType="MusicUsed"><?php echo item('PBCore', 'Music/Sound Used'); ?></pbcoreAnnotation>
	<pbcoreAnnotation annotationType="DatePeg"><?php echo item('PBCore', 'Date Peg'); ?></pbcoreAnnotation>

</pbcoreDescriptionDocument>