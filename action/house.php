<?php
  $g_shop = $core->getAllG($core->user, 'shop');

  $h1 = ['lvl' => $g_shop['h1'] ?? 0];
  $h1['icon'] = $h1['lvl'] <= 3 ? 1 : ($h1['lvl'] <= 6 ? 2 : ($h1['lvl'] <= 9 ? 3 : (3)));

  $h2 = ['lvl' => $g_shop['h2'] ?? 0];
  $h2['icon'] = $h2['lvl'] <= 3 ? 1 : ($h2['lvl'] <= 6 ? 2 : ($h2['lvl'] <= 9 ? 3 : (3)));
  
  $h3 = ['lvl' => $g_shop['h3'] ?? 0];
  $h3['icon'] = $h3['lvl'] <= 3 ? 1 : ($h3['lvl'] <= 6 ? 2 : ($h3['lvl'] <= 9 ? 3 : (3)));
  
  $h4 = ['lvl' => $g_shop['h4'] ?? 0];
  $h4['icon'] = $h4['lvl'] <= 3 ? 1 : ($h4['lvl'] <= 6 ? 2 : ($h4['lvl'] <= 9 ? 3 : (3)));
  
  $h5 = ['lvl' => $g_shop['h5'] ?? 0];
  $h5['icon'] = $h5['lvl'] <= 3 ? 1 : ($h5['lvl'] <= 6 ? 2 : ($h5['lvl'] <= 9 ? 3 : (3)));
  
  $h6 = ['lvl' => $g_shop['h6'] ?? 0];
  $h6['icon'] = $h6['lvl'] <= 3 ? 1 : ($h6['lvl'] <= 6 ? 2 : ($h6['lvl'] <= 9 ? 3 : (3)));
  
  $h7 = ['lvl' => $g_shop['h7'] ?? 0];
  $h7['icon'] = $h7['lvl'] <= 3 ? 1 : ($h7['lvl'] <= 6 ? 2 : ($h7['lvl'] <= 9 ? 3 : (3)));
  
  $h8 = ['lvl' => $g_shop['h8'] ?? 0];
  $h8['icon'] = $h8['lvl'] <= 3 ? 1 : ($h8['lvl'] <= 6 ? 2 : ($h8['lvl'] <= 9 ? 3 : (3)));
  
  $h9 = ['lvl' => $g_shop['h9'] ?? 0];
  $h9['icon'] = $h9['lvl'] <= 3 ? 1 : ($h9['lvl'] <= 6 ? 2 : ($h9['lvl'] <= 9 ? 3 : (3)));
  
  $h10 = ['lvl' => $g_shop['h10'] ?? 0];
  $h10['icon'] = $h10['lvl'] <= 3 ? 1 : ($h10['lvl'] <= 6 ? 2 : ($h10['lvl'] <= 9 ? 3 : (3)));
  
  $h11 = ['lvl' => $g_shop['h11'] ?? 0];
  $h11['icon'] = $h11['lvl'] <= 3 ? 1 : ($h11['lvl'] <= 6 ? 2 : ($h11['lvl'] <= 9 ? 3 : (3)));
  
  $h12 = ['lvl' => $g_shop['h12'] ?? 0];
  $h12['icon'] = $h12['lvl'] <= 3 ? 1 : ($h12['lvl'] <= 6 ? 2 : ($h12['lvl'] <= 9 ? 3 : (3)));
  
  $all_level = $h1['lvl'] + $h2['lvl'] + $h3['lvl'] +
               $h4['lvl'] + $h5['lvl'] + $h6['lvl'] +
               $h7['lvl'] + $h8['lvl'] + $h9['lvl'] +
               $h10['lvl'] + $h11['lvl'] + $h12['lvl'];
  $stars = max(0, floor(($all_level / 120) * 10));