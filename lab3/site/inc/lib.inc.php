<?php
	function getTable($cols = 5, $rows = 5, $color = '#ff0000')
	{
		echo '<table>';
		for ($tr = 1; $tr <= $rows; $tr++) {
			echo '<tr>';
			for ($td = 1; $td <= $cols; $td++) {
				if ($tr == 1 || $td == 1) {
					echo '<th style="background-color: ' . $color . ';">' . ($tr * $td) . '</th>';
				} else {
					echo '<td>' . ($tr * $td) . '</td>';
				}
			}
			echo '</tr>';
		}
		echo '</table>';
	}

	function getMenu($items = [])
	{
		$html = '<ul>';
		foreach ($items as $link => $title) {
			$html .= '<li><a href="' . $link . '">' . $title . '</a></li>';
		}
		$html .= '</ul>';
		echo $html;
	}
?>