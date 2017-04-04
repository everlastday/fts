<div class="content-area client">
	<div class="details-container">
		<div class="detail-title">
			<h3>Загальна iнформація про замовлення</h3>
		</div>
		<div class="detail-body client">
			<form action="">
				<div class="field">
					<label for="total_orders">Загальна кількість замовлень:</label>
					<input class="small" type="text" name="total_orders" value="<?=(isset($report['all_orders'])) ? $report['all_orders'] : 0 ?>" readonly="readonly" />
				</div>
				<div class="field">
					<label for="total_amount_of_orders">Загальна сума замовлень:</label>
					<input class="medium" type="text" name="total_amount_of_orders" value="<?=(isset($report['total_sum'])) ? $report['total_sum'] : 0 ?> грн" readonly="readonly" />
				</div>
				<div class="field">
					<label for="num_active_orders">Кількість активних замовлень:</label>
					<input class="small" type="text" name="num_active_orders" value="<?=(isset($report['active'])) ? $report['active'] : 0 ?>" readonly="readonly"/>
				</div>
				<div class="field">
					<label for="num_paid_orders">Кількість оплачених замовлень:</label>
					<input class="small" type="text" name="num_paid_orders" value="<?=(isset($report['payed'])) ? $report['payed'] : 0 ?>" readonly="readonly"/>
				</div>
				<div class="field">
					<label for="num_paid">Кількість неоплачених:</label>
					<input class="small" type="text" name="num_paid" value="<?=(isset($report['unpaid'])) ? $report['unpaid'] : 0 ?>" readonly="readonly" />
				</div>
				<div class="field">
					<label for="num_completed">Кількість викононих:</label>
					<input class="small" type="text" name="num_completed" value="<?=(isset($report['complete'])) ? $report['complete'] : 0 ?>" readonly="readonly"/>
				</div>
			</form>
		</div>

	</div>
</div> <!-- content area -->